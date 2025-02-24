<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Camp;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    protected $advertisment;
    public function __construct(Advertisment $advertisment){
        $this->advertisment = $advertisment;
    }
    public function index()
    {
        $users = User::where('is_verified',true)->count();
        $advertisments = Advertisment::where('is_expire',false)->where('is_active',true)->count();
        $products = Product::count();
        $camps = Camp::where('is_active',true)->count();
        return view('dashboard.index',[
            'users'=>$users,
            'advertisments'=>$advertisments,
            'products'=>$products,
            'camps'=>$camps
        ]);
    }

    public function advertismentType()
    {
        $fixed = $this->advertisment->where('ads_type','fixed')->count();
        $special = $this->advertisment->where('ads_type','special')->count();
        $normal = $this->advertisment->where('ads_type','normal')->count();
        $data = ['fixed'=>$fixed,'special'=>$special,'normal'=>$normal];
        return response()->json($data);
    }

    public function advertismentStatus()
    {
        $pending = $this->advertisment->where('is_active',false)->count();
        $aproved = $this->advertisment->where('is_active',true)->count();
        $expire = $this->advertisment->where('is_expire',true)->count();
        $data = ['pending'=>$pending,'aproved'=>$aproved,'expire'=>$expire];
        return response()->json($data);
    }
}
