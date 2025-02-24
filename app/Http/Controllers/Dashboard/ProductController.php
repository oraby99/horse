<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\FilesTrait;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    use FilesTrait;
    public $model ;
    public $category ;

    public function __construct(Product $model , Category $category)
    {
        $this->model = $model;
        $this->category = $category;

    }

    public function index()
    {
        $data = $this->model->latest()->get();
        return view('dashboard.products.index',['data'=>$data]);
    }

    public function create()
    {
        $categories = $this->category->where('type','store')->get();
        return view('dashboard.products.create',['categories'=>$categories]);
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        $category  = $this->category->where('type','store')->get();
        return view('dashboard.products.edit',['data'=>$data , 'categories'=>$category]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $dataImage  = [];
        $dataVideos = [];
        $data = $request->all();

        try{
            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $dataImage [] = $this->saveFile($image , config('filepath.PRODUCT_PATH'));
                }
                $data['images'] = $dataImage;
            }


            if($request->hasFile('videos'))
            {
                foreach($request->file('videos') as $video)
                {
                    $dataVideos [] = $this->saveFile($video , config('filepath.VIDEOS_PATH'));
                }
                $data['videos'] = $dataVideos;
            }

            $this->model->create($data);
            return redirect()->back()->with('success', 'Product Added');

        }catch(Exception $e)
        {
            return $e;
        }
    }


    public function update(ProductRequest $request , $id)
    {
        $data =  $request->validated();
        $product =  $this->model->findOrFail($id);
        $dataImage  = [];
        $dataVideos = [];
        try{
            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $dataImage [] = $this->saveFile($image , config('filepath.PRODUCT_PATH'));
                }
                $data['images'] = $dataImage;
            }

            if($request->hasFile('videos'))
            {
                foreach($request->file('videos') as $video)
                {
                    $dataVideos [] = $this->saveFile($video , config('filepath.VIDEOS_PATH'));
                }
                $data['videos'] = $dataVideos;
            }
            $product->update($data);
            return redirect()->back()->with('success', 'Product Updated');
        }catch(Exception $e)
        {
            return $e;
        }


    }


    public function delete($id)
    {
        $product = $this->model->findOrFail($id);
        try{
            if($product->images != null)
            {
                foreach($product->images as $item)
                {
                    $this->deleteFile($item , config('filepath.PRODUCT_PATH'));
                }
            }
            if($product->videos != null)
            {
                foreach($product->videos as $item)
                {
                    $this->deleteFile($item , config('filepath.VIDEOS_PATH'));
                }
            }
            $product->delete();
            return redirect()->back()->with('success','Product Deleted');
        }catch(Exception $e)
        {
            return $e;
        }
    }


}
