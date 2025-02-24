<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $model;
    public function __construct(Order $model)
    {
        $this->model =$model;
    }

    public function index()
    {
        $data = $this->model->get();
        return view('dashboard.orders.index',['data'=>$data]);
    }

    public function show($id)
    {
        $data = $this->model->withTrashed()->find($id);
        return view('dashboard.orders.show',['data'=>$data]);
    }

}
