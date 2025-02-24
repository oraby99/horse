<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertismentProfileResource;
use App\Http\Resources\AdvertismentResource;
use App\Models\Advertisment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProfileController extends Controller
{
    //
    protected $model ;
    protected $advertisment ;

    public function __construct(User $model , Advertisment $advertisment){
        $this->model = $model;
        $this->advertisment = $advertisment;
    }

    public function advertisment(Request $request)
    {
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $activeAds  = $this->advertisment->where('is_active',true)->notExpire()->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);
        $pendingAds = $this->advertisment->where('is_active',false)->notExpire()->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);
        $expire     = $this->advertisment->expire()->where('user_id',auth()->user()->id)->latest()->simplePaginate(7);
        $sign = $request->sign;
        return response()->json([
            'data'=>[
                'active'=>AdvertismentProfileResource::collection($activeAds->map(function ($ads) use ($sign) {
                    $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                    return $ads;
                })),
                'pending'=>AdvertismentProfileResource::collection($pendingAds->map(function ($ads) use ($sign) {
                    $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                    return $ads;
                })),
                'expire'=>AdvertismentProfileResource::collection($expire->map(function ($ads) use ($sign) {
                    $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                    return $ads;
                })),
            ] ,
            'status'=>200,
            'message'=>'Success'
        ]);
    }
}
