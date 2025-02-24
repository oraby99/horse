<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    protected $model;
    public function __construct(Order  $model)
    {
        $this->model = $model;
    }
    public function show(Request $request )
    {
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        if ($bearerToken = $request->bearerToken()) {
        $user = Auth::guard('sanctum')->setRequest($request)->user();
        } else {
            $user = null;
        }
        $data = Order::where('user_id',$user->id)->get();
        if ($data) {
        return response()->json([
            'data'=> OrderResource::collection($data),
            'status'=>200,
            'message'=>'Success'
        ]);
       }
        else
        {
        return response()->json(['data'=>null , 'status'=>404,'message'=>"Not Found"], 404);
        }
    }
}
