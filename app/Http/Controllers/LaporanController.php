<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return response()->json(Laporan::with('petugas')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'petugas_id' => 'required|exists:users,id',
            'judul' => 'required|string',
            'tipe' => 'required|string',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date',
        ]);

        $laporan = Laporan::create($request->all());
        return response()->json($laporan, 201);
    }
}
