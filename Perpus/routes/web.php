<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengurusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main');
});

Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class)->parameters([
    'anggota' => 'anggota'
]);

Route::resource('pengurus', PengurusController::class)->parameters([
    'pengurus' => 'pengurus'
]);

Route::resource('peminjaman', PeminjamanController::class);
