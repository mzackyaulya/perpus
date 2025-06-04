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

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Buku::class)){
            abort(403);
        }
        return view("buku.create");
    }

    public function store(Request $request)
    {
        if ($request->user()->cannot('store', Buku::class)){
            abort(403);
        }
        $val = $request->validate([
            'foto'      => 'required|url',
            'judul'     => 'required|max:50',
            'genre'     => 'required|max:50',
            'penerbit'  => 'required|max:50',
            'stok'      => 'required|integer|min:0',
            'tahun'     => 'required|integer|min:1900|max:' . date('Y')
        ]);

        Buku::create($val);
        return redirect()->route('buku.index')->with('success', $val['judul'].' Berhasil di Simpan');
    }

    public function show(Buku $buku)
    {
        //
    }

    public function edit(Buku $buku,Request $request)
    {
        if ($request->user()->cannot('edit', Buku::class)){
            abort(403);
        }
        return view('buku.edit')->with('buku', $buku);
    }

    public function update(Request $request, Buku $buku)
    {
        if ($request->user()->cannot('update', Buku::class)){
            abort(403);
        }
        $val = $request->validate([
            'foto'      => 'required|url',
            'judul'     => 'required|max:50',
            'genre'     => 'required|max:50',
            'penerbit'  => 'required|max:50',
            'stok'      => 'required|integer|min:0',
            'tahun'     => 'required|integer|min:1900|max:' . date('Y')
        ]);

        $buku->update($val);
        return redirect()->route('buku.index')->with('success', $val['judul'].' Berhasil di Perbarui');
    }

    public function destroy(Buku $buku,Request $request)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success','Data Buku Berhasil di Hapus');
    }
}
