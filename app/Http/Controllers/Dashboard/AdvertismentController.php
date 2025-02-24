<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Category;
use App\Models\Country;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class AdvertismentController extends Controller
{
    public $model;
    public $user ;
    public $country ;
    public $category ;
    public $plan ;

    public function __construct(Advertisment $model , User $user, Country $country , Category $category , Plan $plan)
    {
        $this->model    = $model;
        $this->user     = $user;
        $this->country  = $country;
        $this->category = $category;
        $this->plan     = $plan;

    }

    public function index()
    {
        $data = $this->model->withTrashed()->get();
        return view('dashboard.advertisments.index',['data'=>$data]);
    }
    public function create()
    {
        $user     = $this->user->get();
        $country  = $this->country->get();
        $category = $this->category->get();
        $plan     = $this->plan->get();
        return view('dashboard.advertisments.create',['user'=>$user ,'country'=>$country,'category'=>$category,'plan'=>$plan ]);
    }

    public function store(Request $request)
    {
        $dataImage  = [];
        $dataVideos = [];
        $data = $request->all();
        try{
            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $dataImage [] = $this->saveFile($image , config('filepath.ADVERTISMENT_PATH'));
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
            $data['is_active'] = 1;
            $this->model->create($data);
            return redirect()->back()->with('success', 'advertisment Added');

        }catch (Exception $e) {
            return redirect()->back()->with('error', 'Error adding advertisement' );
        }
    }
    public function saveFile($file, $path) {
        // Generate a unique file name
        $fileName = time().'_'.$file->getClientOriginalName();

        // Save the file to the disk and return the file name
        $file->move(public_path($path), $fileName);

        return $fileName;
    }

    public function show($id)
    {
        $data = $this->model->withTrashed()->find($id);
        return view('dashboard.advertisments.show',['data'=>$data]);
    }

    public function toggleActive(Request $request)
    {
        $data = $this->model->withTrashed()->find($request->id);
        if($data->is_active == false)
        {
            $data->is_active = true;
            $data->save();
        }else{
            $data->is_active = false;
            $data->save();
        }
        return response()->json([
            'status'=>true,
            'message'=>'Success'
        ]);
    }
    public function getCategory(Request $request){
        $categories = Category::filter($request->all())->get();
        $text = "";
        foreach ($categories as $cat) {
            $name = app()->getLocale() === 'en' ? $cat->name_en : $cat->name_ar;
            $text .= "<option value='$cat->id'>$name</option>";
        }
        return response()->json([
            'text'=>$text,
            'type'=>$request->type,
        ]);
    }
}
