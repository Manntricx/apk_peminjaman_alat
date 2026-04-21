<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD yang bisa diakses (nanti dibatasi middleware jika perlu)
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('alats', \App\Http\Controllers\AlatController::class);
    Route::resource('peminjamans', \App\Http\Controllers\PeminjamanController::class);
    Route::resource('pengembalians', \App\Http\Controllers\PengembalianController::class);
    Route::resource('laporans', \App\Http\Controllers\LaporanController::class);
    Route::get('log-aktifitas', [\App\Http\Controllers\LogAktifitasController::class, 'index'])->name('log-aktifitas.index');
});

require __DIR__.'/auth.php';
