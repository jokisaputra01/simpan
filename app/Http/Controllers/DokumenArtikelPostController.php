<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Models\DokumenArtikel;
use Illuminate\Support\Facades\Storage;

class DokumenArtikelPostController extends Controller
{
    public function index()
    {
        $dokumentArtikel = DokumenArtikel::all();
        return view('dashboard.dokumenartikel.index',compact('dokumentArtikel'));
    }
    
    public function create()
    {
        $artikels = Artikel::all();
        return view('dashboard.dokumenartikel.create', compact('artikels'));
    }
    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'file' => 'required|nullable|mimes:jpg,png|max:2048',
            'keterangan' => 'required|string|max:255',
            'artikel_id' => 'required',
        ]);
        if($request->hasFile('file')){
            $validateData['file'] = $request->file('file')->store('dokuments');
        }  
        DokumenArtikel::create($validateData);
        return redirect(route('dokumenartikel.index'));
    }
    
    public function edit(DokumenArtikel $dokumenartikel)
    {
        $artikels = Artikel::all();
        return view('dashboard.dokumenartikel.edit',compact('dokumenartikel','artikels'));
    }

    public function update(Request $request, DokumenArtikel $dokumenartikel)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'file' => 'required|nullable|mimes:jpg,png|max:2048',
            'keterangan' => 'nullable',
            'artikel_id' => 'required',
        ]);
        if($request->hasFile('file')){
            if($request->oldDokumenLogo){
                Storage::delete($request->oldDokumenLogo);
            }
            $validateData['file'] = $request->file('file')->store('dokuments');
        } 
        DokumenArtikel::where('id', $dokumenartikel->id)->update($validateData);
        return redirect(route('dokumenartikel.index'));
    }

    public function destroy(DokumenArtikel $dokumenartikel)
    {
        if ($dokumenartikel->file) {
            Storage::delete($dokumenartikel->file);
        }
        DokumenArtikel::destroy($dokumenartikel->id);
        return redirect(route('dokumenartikel.index'));
    }
}