<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;

class PlanController extends Controller
{
    public $model;
    public function __construct(Plan $model)
    {
        $this->model =$model;
    }
    public function index()
    {
        $data = $this->model->all();
        return view('dashboard.plans.index',['data'=>$data]);
    }
    public function create()
    {
       $plan = $this->model->all();
       return view('dashboard.plans.create',['plans'=>$plan]);
    }

    public function store(PlanRequest $request)
    {
        $data = $request->validated();
        try{
            $this->model->create($data);
            return redirect()->back()->with('success','Created');
        }catch(Exception $e)
        {
            return $e;
        }
    }

    public function edit($id)
    {
        $plan = $this->model->all();
        $data  =$this->model->findOrFail($id);
        return view('dashboard.plans.edit',['data'=>$data,'plans'=>$plan]);
    }
    public function update(PlanRequest $request , $id)
    {
        $data = $request->validated();
        $plan = $this->model->findOrFail($id);
        try{
            $plan->update($data);
            return redirect()->back()->with('success','Updated');
        }catch(Exception $e)
        {
            return $e;
        }
    }
    public function delete($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }
}
