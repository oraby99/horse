<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CountryController extends Controller
{
    //
    public $model;
    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = $this->model->get();
        return response()->json(
            [
                'data'=>CountryResource::collection($data),
                'status'=>200,
                'message'=>'Success'
            ]
            );
    }
}
