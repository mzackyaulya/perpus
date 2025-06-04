<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    public function index(Request $request)
    {
        $anggota = Anggota::all();
        return view('anggota.index')
                ->with('anggota', $anggota);
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Anggota::class)){
            abort(403);
        }
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        if ($request->user()->cannot('store', Anggota::class)){
            abort(403);
        }
        $val = $request-> validate([
            'nis'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'jurusan'=> 'required|max:50',
            'email'=> 'required|max:50',
            'tanggal_lahir'=> 'required',
        ]);

        Anggota::create($val);
        return redirect()->route('anggota.index')->with('success',' Data '. $val['nama'].' berhasil di simpan ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota, Request $request)
    {
        if ($request->user()->cannot('edit', Anggota::class)){
            abort(403);
        }
        return view('anggota.edit')->with('anggota', $anggota);
    }

    public function update(Request $request, Anggota $anggota)
    {
        if ($request->user()->cannot('update', Anggota::class)){
            abort(403);
        }
        $val = $request-> validate([
            'nis'=> 'required|max:10',
            'nama'=> 'required|max:50',
            'jurusan'=> 'required|max:50',
            'email'=> 'required|max:50',
            'tanggal_lahir'=> 'required',
        ]);

        $anggota -> update($val);
        return redirect()->route('anggota.index')->with('success',' Data '. $val['nama']. ' berhasil di perbarui ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota,Request $request)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success',' Data '. $anggota['nama'].' berhasil di hapus ');
    }
}
