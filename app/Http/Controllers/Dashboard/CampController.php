<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Country;
use App\Models\RegisterCamp;
use Illuminate\Http\Request;
use App\Http\Traits\FilesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampRequest;
use App\Models\Camp;
use App\Models\CampLevel;
use App\Models\CampSport;
use App\Models\Category;
use Exception;

class CampController extends Controller
{
    use FilesTrait;
    public $model;
    public function __construct(Camp $model)
    {
        $this->model =$model;
    }
   
    public function index()
    {
        $data = $this->model->all();
        return view('dashboard.camps.index',['data'=>$data]);
    }

    public function registration()
    {
        $data  = RegisterCamp::withSum('campLevel','total')->withSum('campSport','total')->latest()->get();
        return view('dashboard.camps.registration',['data'=>$data]);
    }
    public function create()
    {
        $categories = Category::where('type','camp')->get();
        $countries = Country::all();
        return view('dashboard.camps.create',['categories'=>$categories,'countries'=>$countries]);
    }

    public function store(CampRequest $request)
    {
        $data = $request->validated();
        $dataImage  = [];
        $dataVideos = [];
        try{

            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $dataImage [] = $this->saveFile($image , config('filepath.CAMP_PATH'));
                }
                $data['images'] = $dataImage;
            }
            if($request->hasFile('videos'))
            {
                foreach($request->file('videos') as $video)
                {
                    $dataVideos [] = $this->saveFile($video , config('filepath.VIDEO_PATH'));
                }
                $data['videos'] = $dataVideos;
            }
            $camp =  $this->model->create($data);

            foreach($data['level'] as $index => $level)
            {
                CampLevel::create([
                    'camp_id'=>$camp->id,
                    'level'=>$level,
                    'total'=>$data['level_total'][$index]
                ]);
            }

            foreach($data['sport'] as $index => $level)
            {
                $campSport = CampSport::create([
                    'camp_id'=>$camp->id,
                    'name'=>$level,
                    'total'=>$data['sport_total'][$index]
                ]);
            }
            return redirect()->back()->with('success', 'Camps Added');
        }catch(Exception $e ){
            return $e;
        }
        
    }

    public function show($id)
    {
        $data = $this->model->findOrFail($id);
        return view('dashboard.camps.show',['data'=>$data]);
    }


    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        $categories = Category::where('type','camp')->get();
        $countries = Country::all();
        return view('dashboard.camps.edit',['categories'=>$categories,'countries'=>$countries,'data'=>$data]);
    }

    public function update(CampRequest $request , $id)
    {
        $data = $request->validated();
        $camp = $this->model->findOrFail($id);
        $dataImage  = [];
        $dataVideos = [];

        try{
            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $dataImage [] = $this->saveFile($image , config('filepath.CAMP_PATH'));
                }
                $data['images'] = $dataImage;
            }

            if($request->hasFile('videos'))
            {
                foreach($request->file('videos') as $video)
                {
                    $dataVideos [] = $this->saveFile($video , config('filepath.VIDEO_PATH'));
                }
                $data['videos'] = $dataVideos;
            }

            foreach($data['level'] as $index => $level)
            {
                CampLevel::firstOrCreate([
                    'camp_id'=>$camp->id,
                    'level'=>$level,
                    'total'=>$data['level_total'][$index]
                ]);
            }

            foreach($data['sport'] as $index => $level)
            {
                CampSport::firstOrCreate([
                    'camp_id'=>$camp->id,
                    'name'=>$level,
                    'total'=>$data['sport_total'][$index]
                ]);
            }
            $camp->update($data);
            return redirect()->back()->with('success', 'Camp Updated');
        }catch(Exception $e)
        {
            return $e;
        }
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $camp = Camp::findOrFail($id);
        $camp->status = $status;
        $camp->save();
    }


    public function toggleActive(Request $request)
    {
        $data = $this->model->find($request->id);
        if($data->is_active == false)
        {
            $data->is_active = true;
            $data->save();

            // Send Notification For Abrove //

        }else{
            $data->is_active = false;
            $data->save();
        }
        return response()->json([
            'status'=>true,
            'message'=>'Success'
        ]);
    }


    public function delete($id)
    {
        $camp = $this->model->findOrFail($id);
        try{
            if($camp->images != null)
            {
                foreach($camp->images as $item)
                {
                    $this->deleteFile($item , config('filepath.CAMP_PATH'));
                }
            }     
            if($camp->videos != null)
            {
                foreach($camp->videos as $item)
                {
                    $this->deleteFile($item , config('filepath.VIDEOS_PATH'));
                }
            }
            $camp->delete();
            return redirect()->back()->with('success','Product Deleted');
        }catch(Exception $e)
        {
            return $e;
        }
    }
}
