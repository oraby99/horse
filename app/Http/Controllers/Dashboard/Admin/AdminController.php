<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class AdminController extends Controller
{

    public $model;
    public function __construct(Admin $model)
    {
        $this->model =$model;
    }
    public function loginView()
    {
        return view('dashboard.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt($data))
        {
            return redirect()->route('admin')->with('success','Welcome');
        }else{
            return redirect()->back()->with('error','Invaild Email or Password');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.view');
    }

    public function index()
    {
        $data = $this->model->all();
        return view('dashboard.admins.index',['data'=>$data]);
    }
    public function create()
    {
       $admin = $this->model->all();
       return view('dashboard.admins.create',['admins'=>$admin]);
    }
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
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
        $admin = $this->model->all();
        $data  =$this->model->findOrFail($id);
        return view('dashboard.admins.edit',['data'=>$data,'admins'=>$admin]);
    }
    public function update(AdminRequest $request , $id)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $admin = $this->model->findOrFail($id);
        try{
            $admin->update($data);
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
