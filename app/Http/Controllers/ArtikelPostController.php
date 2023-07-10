<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class ArtikelPostController extends Controller
{
    
    public function index()
    {
        $artikels = Artikel::all();
        return view('dashboard.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $subKategories = SubKategori::all();
        return view('dashboard.artikel.create', compact('subKategories'));
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'sub_judul' => 'required',
            'status' => 'nullable',

            'isi_artikel' => 'required|nullable',
            'tanggal_dibuat' => 'required',
            'dibaca' => 'nullable',
            'tag' => 'nullable',
            'sub_kategori_id' => 'required',
        ]);
        $validateData['status'] = $request->status == true ? '1' : '0';
        Artikel::create($validateData);
        return redirect(route('artikel.index'));
    }

    public function edit(Artikel $artikel)
    {
        $subKategories = SubKategori::all();
        return view('dashboard.artikel.edit', compact('artikel', 'subKategories'));
    }

    
    public function update(Request $request, Artikel $artikel)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'sub_judul' => 'required',
            'status' => 'nullable',
            'isi_artikel' => 'required|nullable',
            'tanggal_dibuat' => 'required',
            'dibaca' => 'nullable',
            'tag' => 'nullable',
            'sub_kategori_id' => 'required',
        ]);
        $validateData['status'] = $request->status == true ? '1' : '0';


        Artikel::where('id', $artikel->id)
            ->update($validateData);

        return redirect(route('artikel.index'));
    }

    
    public function destroy(Artikel $artikel)
    {
        Artikel::destroy($artikel->id);
        return redirect(route('artikel.index'));
    }
}