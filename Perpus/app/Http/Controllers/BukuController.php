<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view("buku.index")->with("buku",$buku);
    }

    public function create()
    {
        return view("buku.create");
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'foto'      => 'required|url',
            'judul'     => 'required|max:50',
            'genre'     => 'required|max:50',
            'penerbit'  => 'required|max:50',
            'stok'      => 'required|integer|min:0',
            'tahun'     => 'required|integer|min:1900|max:' . date('Y')
        ]);

        Buku::create($val);
        return redirect()->route('buku.index')->with('success', $val['judul'].' Berhasi di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
