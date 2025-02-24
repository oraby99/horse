<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Api\SearchResource;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\FilesTrait;
use App\Models\Advertisment;
use App\Models\Camp;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
     use FilesTrait;
     public $model;
     public function __construct(Category $model)
     {
         $this->model =$model;
     }
 
 
     public function index()
     {
         $data = $this->model->all();
         return view('dashboard.categories.index',['data'=>$data]);
     }

     public function create()
     {
        $category = $this->model->all();
        return view('dashboard.categories.create',['categories'=>$category]);
     }
 
     public function edit($id)
     {
        $category = $this->model->all();
         $data  =$this->model->findOrFail($id);
         return view('dashboard.categories.edit',['data'=>$data,'categories'=>$category]);   
     }

     public function store(CategoryRequest $request)
     {
         $data = $request->validated();
         if($request->hasFile('image'))
         {
            $data['image'] = $this->saveFile($request->file('image'),config('filepath.CATEGORY_PATH'));
         }
         if($request->has('has_child'))
         {
            $data['has_child'] = true;
         }
         try{
             $this->model->create($data);
             return redirect()->back()->with('success','Created');
         }catch(Exception $e)
         {
             return $e;
         }
     }
 
     public function update(CategoryRequest $request , $id)
     {
         $data = $request->validated();
 
 
         $category = $this->model->findOrFail($id);
 
         if($request->has('has_child'))
         {
            $data['has_child'] = true;
         }
         if($request->hasFile('image'))
         {
             $data['image'] = $this->updateFile($request->file('image'),$category->image,config('filepath.CATEGORY_PATH'));
         }
         try{
             $category->update($data);
             return redirect()->back()->with('success','Updated');
         }catch(Exception $e)
         {
             return $e;
         }
     }
 
     public function delete($id)
     {
         $data = $this->model->findOrFail($id);
 
         if($data->image != null)
         {
             $this->deleteFile($data->image,config('filepath.CATEGORY_PATH'));
         }
         $data->delete();    
         return redirect()->back()->with('success','Deleted');
     }


    //  Api Methods 

    public function getMainCategory(Request $request)
    {
        
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = $this->model->whereNull('parent_id')->get();
        return response()->json([
            'data'=>CategoryResource::collection($data),
            'status'=>200,
            'message'=>'Success'
        ]);
    }


    public function search(Request $request)
    {
        
        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $query = $request->input('q');
        $sign = $request->sign;
       // Assuming you want 10 items per page
       $perPage = 10;

        // Retrieve and map products
        $productsQuery = Product::whereTranslationLike('name',"%{$query}%");
        $products = $productsQuery->paginate($perPage)->map(function ($item) use     ($sign) {
            $item->type = 'product';
            $item->price = $item->getPriceInCurrency($sign , $item->price);
            return $item;
        });
    
        // Retrieve and map advertisements
        $advertisementsQuery = Advertisment::where('name', 'LIKE', "%{$query}%")->where('is_active',true);
        $advertisements = $advertisementsQuery->paginate($perPage)->map(function     ($item) use ($sign) {
            $item->type = 'advertisment';
            $item->price = $item->getPriceInCurrency($sign , $item->price);
            return $item;
        });

        $allResults = $products->merge($advertisements);
        return response()->json([
            'data'=>SearchResource::collection($allResults),
            'status'=>200,
            'message'=>'Success'
        ]);
    }
}
