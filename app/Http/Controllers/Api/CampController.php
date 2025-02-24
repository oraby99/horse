<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CampRegisterRequest;
use App\Http\Resources\CampDetailsResource;
use App\Http\Resources\CampLevelResource;
use App\Http\Resources\CampSportResource;
use App\Models\Camp;
use App\Models\CampLevel;
use App\Models\CampSport;
use App\Models\RegisterCamp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CampController extends Controller
{
    //
    protected $model;
    public function __construct(Camp  $model)
    {
        $this->model = $model;
    }

    public function show(Request $request ,$id)
    {

        if($request->header('locale'))
        {
            App::setLocale($request->header('locale'));
        }else{
            App::setLocale('ar');
        }
        $data = $this->model->find($id);
        if ($data) {
        $data['price'] = $data->getPriceInCurrency($request->sign , $data->price);
        return response()->json([
            'data'=> new CampDetailsResource($data),
            'status'=>200,
            'message'=>'Success'
        ]);
    }
    else
    {
     return response()->json(['data'=>null , 'status'=>404,'message'=>"Not Found"], 404);
    }
    }

    public function store(CampRegisterRequest $request)
    {
        $data = $request->validated();
        try{
            $data['user_id'] = auth()->user()->id;
            RegisterCamp::create($data);
            return response()->json([
                'data'=> NULL,
                'status'=>200,
                'message'=>'Submited'
            ]);
        }catch(Exception $e)
        {
            return response()->json([
                'data'=> NULL,
                'status'=>500,
                'message'=>$e->getMessage()
            ], 500);
        }


    }

    public function getLevelByCamp(Request $request)
    {
        $data = CampLevel::filter($request->all())->latest()->get();
        return response()->json([
            'data'=> CampLevelResource::collection($data),
            'status'=>200,
            'message'=>'Done'
        ]);
    }

    public function getSportByCamp(Request $request)
    {
        $data = CampSport::filter($request->all())->latest()->get();
        return response()->json([
            'data'=> CampSportResource::collection($data),
            'status'=>200,
            'message'=>'Done'
        ]);
    }

}
