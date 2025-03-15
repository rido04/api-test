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

    public function store(Request $request)
    {
        // Store data menggunakan validat
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi_produk' => 'required|string|max:255',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
        ]);

        $product = Product::create($request->all([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]));

        if(!$product) {
            return response()->json([
                'message' => 'Data gagal disimpan'
            ], 400);
        }

        return response()->json($product, 200);
    }

    public function show()
    {
        return view('products.show');
    }
}
