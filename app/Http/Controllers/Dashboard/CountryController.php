<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Traits\FilesTrait;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    use FilesTrait;
    public $model;
    public function __construct(Country $model)
    {
        $this->model =$model;
    }


    public function index()
    {
        $data = $this->model->all();
        return view('dashboard.countries.index',['data'=>$data]);
    }


    public function edit($id)
    {
        $data  =$this->model->findOrFail($id);
        return view('dashboard.countries.edit',['data'=>$data]);   
    }

    public function update(CountryRequest $request , $id)
    {
        $data = $request->validated();


        $country = $this->model->findOrFail($id);

        if($request->hasFile('logo'))
        {
            $data['logo'] = $this->updateFile($request->file('logo'),$country->logo,config('filepath.COUNTRY_PATH'));
        }
        try{
            $country->update($data);
            return redirect()->back()->with('success','Updated');
        }catch(Exception $e)
        {
            return $e;
        }
    }

    public function delete($id)
    {
        $data = $this->model->findOrFail($id);

        if($data->logo != null)
        {
            $this->deleteFile($data->logo,config('filepath.COUNTRY_PATH'));
        }
        $data->delete();    
        return redirect()->back()->with('success','Deleted');
    }


    public function updateCurrency(Request $request)
    {
        $data = $this->model->find($request->id);
        $data->update([
            'currency'=>$request->currency
        ]);
        return response(['status'=>200,'message'=>'Successfully Updated']);
    }
}
