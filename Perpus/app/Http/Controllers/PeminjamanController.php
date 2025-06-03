<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
        $peminjaman = Peminjaman::with(['anggota', 'buku', 'pengurus'])->get();

        foreach ($peminjaman as $item) {
            if (
                $item->status == 'diPinjam' &&
                \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($item->tanggal_kembali))
            ) {
                $item->status = 'Telat';
                $item->save();
            }
        }

            return view('peminjaman.index')
                    ->with('peminjaman', $peminjaman);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        $pengurus = Pengurus::all();

        return view('peminjaman.create')->with('buku',$buku)->with('anggota', $anggota)->with('pengurus',$pengurus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request -> validate([
            'buku_id' => 'required|uuid|exists:bukus,id',
            'anggota_id' => 'required|uuid|exists:anggotas,id',
            'pengurus_id' => 'required|uuid|exists:penguruses,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $buku = Buku::find($val['buku_id']);

        if ($buku->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        Peminjaman::create($val);
        $buku->decrement('stok');
        $anggota = Anggota::find($val['anggota_id']);
        return redirect()->route('peminjaman.index')->with('success',' Data Peminjaman '. $anggota['nama'].' berhasil di simpan ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        $pengurus = Pengurus::all();

        return view('peminjaman.edit')->with('buku',$buku)->with('anggota', $anggota)->with('pengurus',$pengurus)->with('peminjaman', $peminjaman);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {

        if ($request->has('ubah_status')) {
            if ($peminjaman->status != 'diKembalikan') {
                $buku = Buku::find($peminjaman->buku_id);
                $buku->increment('stok');
            }

            $peminjaman->status = 'diKembalikan';
            $peminjaman->save();

            return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Buku berhasil di Kembalikan.');
        }

        $val = $request -> validate([
            'buku_id' => 'required|uuid|exists:bukus,id',
            'anggota_id' => 'required|uuid|exists:anggotas,id',
            'pengurus_id' => 'required|uuid|exists:penguruses,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:Pending,diPinjam,diKembalikan,Telat'
        ]);

        $peminjaman -> update($val);
        $anggota = Anggota::find($val['anggota_id']);
        return redirect()->route('peminjaman.index')->with('success',' Data Peminjaman '. $anggota['nama'].' berhasil di perbarui ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
