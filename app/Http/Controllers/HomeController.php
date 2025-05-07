<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Advertisment;

class HomeController extends Controller
{
    public function index()
    {
        $categroy = Category::all();
        $products = Product::with('images')->paginate(8); // Change 8 to your desired items per page
        $ads = Advertisment::with(['category', 'country'])->get();
        
        return view('welcome', compact('categroy', 'products', 'ads'));
    }
}