<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['peminjam', 'petugas', 'detailPeminjamans.alat'])->get();
        return response()->json($peminjamans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjam_id' => 'required|exists:users,id',
            'petugas_id' => 'required|exists:users,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali_rencana' => 'required|date',
        ]);

        $data = $request->all();
        $data['kode_peminjaman'] = 'PMJ-' . strtoupper(uniqid());
        $data['status'] = 'dipinjam';

        $peminjaman = Peminjaman::create($data);
        return response()->json($peminjaman, 201);
    }

    public function show(Peminjaman $peminjaman)
    {
        return response()->json($peminjaman->load(['peminjam', 'petugas', 'detailPeminjamans.alat', 'pengembalian']));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->update($request->all());
        return response()->json($peminjaman);
    }
}
