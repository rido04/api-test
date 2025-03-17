<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = ('http://127.0.0.1:8000/api/products');
        $response = $client->request('GET', $url);
        $content= $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('product.index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->nama_produk;
        $description = $request->deskripsi_produk;
        $price = $request->harga_produk;
        $stock = $request->stok_produk;

        $parameters = [
            'nama_produk' => $product,
            'deskripsi_produk' => $description,
            'harga_produk' => $price,
            'stok_produk' => $stock,
        ];

        $client = new Client();
        $url = ('http://127.0.0.1:8000/api/products');
        $response = $client->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode($parameters),
        ]);
        $content= $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] == 'success') {
            return redirect()->route('products.index')->with('success', 'Data produk berhasil ditambahkan');
        } else {
            return redirect()->route('products.index')->with('error', 'Data produk gagal ditambahkan');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return ('Data produk tidak ditemukan');
        }

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return ([ 'error' => 'Data produk tidak ditemukan']);
        }

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string',
            'deskripsi_produk' => 'required|string',
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return ([ 'error' => $validator->errors()]);
        }

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Data produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
