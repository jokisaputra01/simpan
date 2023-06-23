<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $subKategories = SubKategori::all();
        return view('dashboard.subkategori.index',compact('subKategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategories = Kategori::all();
        return view('dashboard.subkategori.create',compact('kategories'));
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
            'nama' => 'required|max:255',
            'kategori_id' => 'required',
        ]);
        SubKategori::create($validateData);
        return redirect(route('subkategori.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function show(SubKategori $subKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subKategori = SubKategori::findOrFail($id);
        $kategories = Kategori::all();
        return view('dashboard.subkategori.edit',compact('subKategori','kategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            "nama"=>$request->nama,
            'kategori_id' => $request->kategori_id
        ];
        SubKategori::where('id', $id)->update($update);
        return redirect(route('subkategori.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubKategori::destroy($id);
        return redirect(route('subkategori.index'));
    }
}
