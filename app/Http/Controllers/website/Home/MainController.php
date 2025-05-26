<?php

namespace App\Http\Controllers\website\Home;

use App\Models\Category;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\website\ads;
use App\Models\Country;
use App\Models\Product;

class MainController extends Controller
{
    protected $model;
    protected $area;
    protected $category;
    public function __construct(Advertisment $model , Category $category  )
    {
        $this->model = $model;
        $this->category = $category;
    }
    public function main()
    {
        $categroy = category::all();
        $ads      = Advertisment::where('is_active',true)->take(8)->latest()->get();
        $products = Product::take(8)->latest()->get();
    //  return $categroy;
        return view('welcome',compact( 'categroy','ads','products'));
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        $currentLocale = app()->getLocale();
        return view('about',compact('currentLocale'));
    }
    public function terms()
    {
        $currentLocale = app()->getLocale();
        return view('terms',compact('currentLocale'));
    }
    public function home(Request $request)
    {
        // return $request->all();
        $query = $this->model->where('is_active',true);

        if(isset($request->key))
        {
            if(isset($request->category_id))
            {
                $query->where('category_id',$request->category_id);
            }
            // if(isset($request->type))
            // {
            //     // $query->where('')
            // }
        }
        $data = $query->with('user')->where('is_active',true)->filter($request->all())->latest()->paginate(6);
        $categroy = $this->category->all();
        // return $categroy;
        return view('advertisment.index',['data'=>$data,'categories'=>$categroy]);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('advertisment.show',compact( 'product' ) );
    }

    public function showAds($id)
    {
        $data = Advertisment::findOrFail($id);
        return view('advertisment.show_ads',compact('data'));
    }
    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        return view('advertisment.create', ['categories' => $categories, 'countries' => $countries]);
    }
    public function storeadd(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $newImageName = "advertisments-" . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/advertisments/'), $newImageName);
                $imageNames[] = $newImageName;
            }
        }
        $data['images'] = $imageNames;

        if ($request->hasFile('videos')) {
            if ($data['videos'] !== null) {
                $oldVideoPath = public_path('uploads/advertisments/') . $data['videos'] ;
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }
            $newVideo = $request->file('videos');
            $newVideoName = "advertisments-" . uniqid() . '.' . $newVideo->getClientOriginalExtension();
            $newVideo->move(public_path('uploads/advertisments/'), $newVideoName);
            $data['videos'] = $newVideoName;
        }

        $ads = Advertisment::create($data);
        return redirect()->back()->with(['success' => 'Ads added successfully!']);
    }

}

