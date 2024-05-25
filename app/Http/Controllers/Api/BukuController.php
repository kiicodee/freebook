<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::orderBy('namaBuku', 'asc')->get();
        if($data) {
        return response()->json([
            'status' => true,
            'pesan' => 'Buku Ditemukan',
            'data'  => $data
        ], 200);} else
        return response()->json([
            'status' => false,
            'pesan' => 'Buku tidak ditemukan',
            'data' => $data
        ], 401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaBuku' => 'required',
            'penulisId' => 'required',
            'kategoriId' => 'required',
            'deskripsi' => 'required',
            'sampul' => 'required',
            'ebook' => 'required',
            'status' => 'required',
            'tanggal_publish' => 'required|date'
        ]);

        $buku = new Buku();
        $buku->namaBuku = $request->namaBuku;
        $buku->penulisId = $request->penulisId;
        $buku->kategoriId = $request->kategoriId;
        $buku->deskripsi = $request->deskripsi;
        $buku->sampul = $request->sampul;
        $buku->ebook = $request->ebook;
        $buku->status = $request->status;
        $buku->tanggal_publish = $request->tanggal_publish;

        $buku->save();

        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil ditambahkan',
            'data' => $buku
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::find($id);
        if($buku) {
            return response()->json([
                'status' => true,
                'pesan' => 'Buku ditemukan',
                'data' => $buku
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'pesan' => 'Buku tidak ditemukan'   
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
