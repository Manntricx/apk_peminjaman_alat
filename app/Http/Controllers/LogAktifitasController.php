<?php

namespace App\Http\Controllers;

use App\Models\LogAktifitas;

class LogAktifitasController extends Controller
{
    public function index()
    {
        return response()->json(LogAktifitas::with('user')->latest('waktu')->get());
    }
}
