<?php

namespace App\Http\Controllers;

use App\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ujian.index', ['ujians' => Ujian::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ujian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ujian::create($request->all());
        return redirect()->route('ujian.create')->with('status', "Berhasil menambahkan data ujian");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ujian = Ujian::findOrFail($id);
        return view('ujian.edit', ['ujian' => $ujian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ujian = Ujian::findOrFail($id);
        $ujian->nama_mk = $request->get('nama_mk');
        $ujian->dosen = $request->get('dosen');
        $ujian->jumlah_soal = $request->get('jumlah_soal');
        $ujian->keterangan = $request->get('keterangan');
        $ujian->save();

        return redirect()->route('ujian.edit', ['id' => $ujian->id])->with('status', "Berhasil mengedit ujian $ujian->nama_mk");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ujian = Ujian::findOrFail($id);
        $nama_mk = $ujian->nama_mk;
        $ujian->delete();
        return redirect()->route('ujian.index')->with('status', "Berhasil menghapus $nama_mk");
    }
}
