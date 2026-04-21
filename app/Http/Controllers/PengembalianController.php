<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id|unique:pengembalians,peminjaman_id',
            'petugas_id' => 'required|exists:users,id',
            'tgl_pengembalian' => 'required|date',
            'kondisi' => 'required|string',
        ]);

        $pengembalian = Pengembalian::create($request->all());

        // Update status peminjaman dan tanggal aktual
        $peminjaman = Peminjaman::find($request->peminjaman_id);
        $peminjaman->update([
            'status' => 'dikembalikan',
            'tgl_kembali_aktual' => $request->tgl_pengembalian
        ]);

        return response()->json($pengembalian, 201);
    }

    public function index()
    {
        return response()->json(Pengembalian::with(['peminjaman', 'petugas'])->get());
    }
}
