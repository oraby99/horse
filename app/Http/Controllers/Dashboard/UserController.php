<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Traits\FilesTrait;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use FilesTrait;
    public $model;
    public function __construct(User $model)
    {
        $this->model =$model;
    }


    public function index()
    {
        $data = $this->model->get();
        return view('dashboard.users.index',['data'=>$data]);
    }

    public function show($id)
    {
        $data = $this->model->withTrashed()->findOrFail($id);
        return view('dashboard.users.show',['data'=>$data]);
    }

    public function edit($id)
    {
        $data  =$this->model->withTrashed()->findOrFail($id);
        return view('dashboard.users.edit',['data'=>$data]);
    }

    public function update(UserRequest $request , $id)
    {
        $data  =$request->validated();
        try{
            $user = $this->model->findOrFail($id);
            if($request->hasFile('image'))
            {
                $data['image'] = $this->updateFile($request->file('image'),$user->image,config('filepath.USER_PATH'));
            }
            $user->update($data);
            return redirect()->route('dashboard.users.index')->with('success','Updated');
        }catch(Exception $e)
        {
            return $e;
        }
    }

    public function toggleData(Request $request)
    {
        $data = $this->model->withTrashed()->find($request->id);
        if($data->trashed())
        {
            $data->restore();
        }else{
            $data->delete();
        }
        return response()->json([
            'status'=>true,
            'message'=>'Success'
        ]);
    }
    public function delete($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }
    // public function restore(Request $request)
    // {
    //     $data = $this->model->withTrashed()->find($request->id);
    //     $data->restore();
    //     return response()->json([
    //         'status'=>true,
    //         'message'=>'User Activate'
    //     ]);
    // }
}
