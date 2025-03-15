<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        return response()->json($products, 200);
    }

    public function store()
    {
        return view('products.create');
    }

    public function show()
    {
        return view('products.show');
    }
}
