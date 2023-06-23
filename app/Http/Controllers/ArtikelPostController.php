<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArtikelPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.artikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subKategories = SubKategori::all();
        return view('dashboard.artikel.create', compact('subKategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'sub_judul' => 'required',
            'status_aktif' => 'required|nullable',
            'isi_artikel' => 'required|nullable',
            'tanggal_dibuat' => 'required',
            'dibaca' => 'nullable',
            'tag' => 'nullable',
            'sub_kategori_id' => 'required',
        ]);
        dd($validateData);
        // Artikel::create($validateData);
        return redirect(route('artikel.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        //
    }
}
