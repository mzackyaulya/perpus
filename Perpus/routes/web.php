<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('buku', BukuController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class)->parameters([
        'anggota' => 'anggota'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('pengurus', PengurusController::class)->parameters([
        'pengurus' => 'pengurus'
    ]);
});


Route::middleware(['auth'])->group(function () {
    Route::resource('peminjaman', PeminjamanController::class)->parameters([
        'peminjaman' => 'peminjaman'
    ]);
});


require __DIR__.'/auth.php';
