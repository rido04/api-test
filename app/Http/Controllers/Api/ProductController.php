<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status' => 'true',
            'message' => 'Data produk berhasil diambil',
            'data' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product = Product::create($request->all());
        return response()->json([
            'status' => 'true',
            'message' => 'Data produk berhasil ditambahkan',
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return response()->json([
                'status' => 'false',
                'message' => 'Data produk tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 'true',
            'message' => 'Data produk ditemukan',
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        if(!$product) {
            return response()->json([
                'status' => 'false',
                'message' => 'Data produk tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $product->update($request->all());
        return response()->json([
            'status' => 'true',
            'message' => 'Data produk berhasil diupdate',
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if(!$product) {
            return response()->json([
                'status' => 'false',
                'message' => 'Data produk tidak ditemukan',
            ], 404);
        }

        $product->delete();
        return response()->json([
            'status' => 'true',
            'message' => 'Data produk berhasil dihapus',
        ]);
    }
}
