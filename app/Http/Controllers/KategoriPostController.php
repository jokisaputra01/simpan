<?php

namespace App\Http\Controllers;

use App\Models\Opede;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori:: all();
        return view('dashboard.Kategori.index',compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $opedes = Opede::all();
        return view('dashboard.kategori.create',compact('opedes'));
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
            'jenis_kategori' => 'required|max:255',
            'opede_id' => 'required',
        ]);
        Kategori::create($validateData);
        return redirect(route('kategori.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }
    
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $opedes = Opede::all();
        return view('dashboard.kategori.edit',compact('kategori','opedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            "nama"=>$request->nama,
            "jenis_kategori"=>$request->jenis_kategori,
            'opede_id' => $request->opede_id
        ];
        Kategori::where('id', $id)->update($update);
        return redirect(route('kategori.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect(route('kategori.index'));
    }
}
