<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_customer' => 'required|string',
            'alamat_customer' => 'required|string',
            'telp_customer' => 'required|string',
            'email_customer' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $customer = Customer::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data customer berhasil ditambahkan',
            'data' => $customer
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        if (!$customer) {
            return response()->json([
                'status' => 'false',
                'message' => 'Data customer tidak ditemukan',
            ], 404);
        }

        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_customer' => 'required|string',
            'alamat_customer' => 'required|string',
            'telp_customer' => 'required|string',
            'email_customer' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Data customer berhasil diubah',
            'data' => $customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        if (!$customer) {
            return response()->json([
                'status' => 'false',
                'message' => 'Data customer tidak ditemukan',
            ], 404);
        }

        $customer->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data customer berhasil dihapus',
        ]);
    }
}
