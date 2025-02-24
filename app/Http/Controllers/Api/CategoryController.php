<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertismentResource;
use App\Http\Resources\CampResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\SubCategoryResource;
use App\Models\Advertisment;
use App\Models\Camp;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    //
    protected $model;
    protected $advertisment;
    protected $camp;
    protected $product;



    public function __construct(Category $model , Advertisment $advertisment , Camp $camp , Product $product)
    {
        $this->model = $model;
        $this->advertisment = $advertisment;
        $this->camp = $camp;
        $this->product = $product;
    }

    public function mainCategory(Request $request)
    {
      
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data  = $this->model->whereNull('parent_id')->latest()->simplePaginate(7);
        return response()->json([
            'data'=> CategoryResource::collection($data),
            'status'=>200,
            'message'=>'Success'
        ]);
    }

    public function getCategoriesById(Request $request ,$id)
    {
        
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = $this->model->where('parent_id',$id)->get();
        return response()->json([
            'data'=> CategoryResource::collection($data),
            'status'=>200,
            'message'=>'Success'
        ]);
    }

    public function getCategoryByType(Request $request)
    {
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = $this->model->filter($request->all())->get();
        return response()->json([
            'data'=> CategoryResource::collection($data),
            'status'=>200,
            'message'=>'Success'
        ]);
    }
    public function getSubCategory(Request $request , $id)
    {   
        
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $categories =  $this->model->where('parent_id',$id)->latest()->simplePaginate(7);
        $advertisments =  $this->advertisment->where('category_id',$id)->where('is_active',true)->latest()->simplePaginate(7);
        $camps =  $this->camp->where('category_id',$id)->latest()->simplePaginate(7);     
        $products = $this->product->where('category_id',$id)->latest()->simplePaginate(7);
        $sign = $request->sign;
       
        return response()->json([
            'data'=> [
                'categories'=>CategoryResource::collection($categories),
                'products'=>ProductResource::collection(
                    $products->map(function ($product) use ($sign) {
                        $product->price = $product->getPriceInCurrency($sign , $product->price);
                        return $product;
                    })),
                'advertisments'=>AdvertismentResource::collection(
                    $advertisments->map(function ($ads) use ($sign) {
                        $ads->price = $ads->getPriceInCurrency($sign , $ads->price);
                        return $ads;
                    })),
                'camps'=>CampResource::collection(
                    $camps->map(function ($camps) use ($sign) {
                        $camps->price = $camps->getPriceInCurrency($sign , $camps->price);
                        return $camps;
                    })),
            ],
            'status'=>200,
            'message'=>'Success'
        ]);
    }
}
