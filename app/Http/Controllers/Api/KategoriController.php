<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    {   
        $data = Kategori::orderBy('namaKategori', 'asc')->get();
        if($data) {
        return response()->json([
            'status' => true,
            'pesan' => 'Kategori Ditemukan',
            'data'  => $data
        ], 200);} else
        return response()->json([
            'status' => false,
            'pesan' => 'Kategori tidak ditemukan',
            'data' => $data
        ], 401);
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required',
        ]);

        $kategori = new Kategori();
        $kategori->namaKategori = $request->namaKategori;

        $kategori->save();

        return response()->json([
            'status' => true,
            'message' => 'Kategori berhasil ditambahkan',
            'data' => $kategori
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);
        if(empty($kategori)) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan',
                'data' => $kategori
            ],401);
        }

        $rules = [
            'namaKategori' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);


        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak bisa diupdate',
                'data' => $kategori
            ],422);
        }

        $kategori->namaKategori = $request->namaKategori;

        $post = $kategori->save();

        return response()->json([
            'status' => true,
            'message' => 'Kategori telah diupdate',
            'data' => $kategori
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        if(empty($kategori)) {
            return response()->json([
                'status' => false,
                'message' => 'Kategori tidak ditemukan',
                'data' => $kategori
            ],401);
        }

        $post = $kategori->delete;
        return response()->json([
            'status' => true,
            'message' => 'Kategori telah dihapus',
            'data' => $kategori
        ], 200);

    }
}
