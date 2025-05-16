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
        $products = Product::with('images')->paginate(8); // Paginate products
        $ads = Advertisment::with(['category', 'country', 'images'])->paginate(8); // Paginate ads
        // $categroy;
        return view('welcome', compact('categroy', 'products', 'ads'));
    }
}