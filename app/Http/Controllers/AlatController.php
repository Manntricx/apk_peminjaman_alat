<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alats = Alat::with('kategori')->get();
        return response()->json($alats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:categories,id',
            'nama_alat' => 'required|string',
            'stok_total' => 'required|integer',
            'kondisi' => 'required|string',
        ]);

        $data = $request->all();
        $data['stok_tersedia'] = $request->stok_total; // Default stok tersedia = stok total

        $alat = Alat::create($data);
        return response()->json($alat, 201);
    }

    public function show(Alat $alat)
    {
        return response()->json($alat->load('kategori'));
    }

    public function update(Request $request, Alat $alat)
    {
        $alat->update($request->all());
        return response()->json($alat);
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();
        return response()->json(null, 204);
    }
}
