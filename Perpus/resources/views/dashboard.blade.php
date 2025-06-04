@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <h1> Dashboard</h1>

    <div style="display: flex; gap: 2rem; justify-content: center;">
        <div style="padding: 1rem; border: 1px solid #ccc; border-radius: 8px; width: 300px; text-align: center;">
            <h2>Jumlah Buku</h2>
            <p style="font-size: 2rem; font-weight: bold;">{{ $jumlahBuku }}</p>
        </div>

        <div style="padding: 1rem; border: 1px solid #ccc; border-radius: 8px; width: 300px; text-align: center;">
            <h2>Jumlah Anggota</h2>
            <p style="font-size: 2rem; font-weight: bold;">{{ $jumlahAnggota }}</p>
        </div>

        <div style="padding: 1rem; border: 1px solid #ccc; border-radius: 8px; width: 300px; text-align: center;">
            <h2>Jumlah Peminjaman</h2>
            <p style="font-size: 2rem; font-weight: bold;">{{ $jumlahPeminjaman }}</p>
        </div>
    </div>

    <hr>

    {{-- Gambar berdiri sendiri --}}
    <div style="text-align: center; margin-bottom: 2rem;">
        <img src="{{ url('assets/images/backgrounds/perpus.jpg') }}" alt="Gambar Perpustakaan" style="max-width: 700px; width: 100%; height: auto; border-radius: 10px;">
    </div>


@endsection


