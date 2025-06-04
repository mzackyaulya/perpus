<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPeminjaman = Peminjaman::count();
        $jumlahBuku = Buku::count();
        $jumlahAnggota = Anggota::count();

        return view('dashboard', compact('jumlahBuku', 'jumlahAnggota','jumlahPeminjaman'));
    }
}
