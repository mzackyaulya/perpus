<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main');
});

Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class)->parameters([
    'anggota' => 'anggota'
]);

