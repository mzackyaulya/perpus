<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

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
        return redirect()->route('buku.index')->with('success', $val['judul'].' Berhasil di Simpan');
    }

    public function show(Buku $buku)
    {
        //
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit')->with('buku', $buku);
    }

    public function update(Request $request, Buku $buku)
    {
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

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success','Data Buku Berhasil di Hapus');
    }
}
