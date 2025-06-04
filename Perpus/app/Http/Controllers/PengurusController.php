<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = Pengurus::all();
        return view('pengurus.index')
            ->with('pengurus',$pengurus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Pengurus::class)){
            abort(403);
        }
        return view('pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('store', Pengurus::class)){
            abort(403);
        }
        $val = $request -> validate([
            'nuptk' => 'required|max:10',
            'nama'  => 'required|max:45',
            'email'=> 'required|max:45',
            'tanggal_lahir' => 'required'
        ]);

        Pengurus::create($val);
        return redirect()->route('pengurus.index')->with('success',' Data '. $val['nama'].' berhasil di simpan ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengurus $pengurus,Request $request)
    {
        if ($request->user()->cannot('edit', Pengurus::class)){
            abort(403);
        }
        return view('pengurus.edit')->with('pengurus', $pengurus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengurus $pengurus)
    {
        if ($request->user()->cannot('update', Pengurus::class)){
            abort(403);
        }
        $val = $request -> validate([
            'nuptk' => 'required|max:10',
            'nama'  => 'required|max:45',
            'email'=> 'required|max:45',
            'tanggal_lahir' => 'required'
        ]);

        $pengurus -> update($val);
        return redirect()->route('pengurus.index')->with('success',' Data '. $val['nama']. ' berhasil di perbarui ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengurus $pengurus)
    {
        $pengurus-> delete();
        return redirect()->route('pengurus.index')->with('success',' Data '. $pengurus['nama'].' berhasil di hapus ');
    }
}
