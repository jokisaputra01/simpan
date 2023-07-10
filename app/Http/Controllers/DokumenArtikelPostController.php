<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Models\dokumenartikel;

class DokumenArtikelPostController extends Controller
{
    public function index()
    {
        return view('dashboard.dokumenartikel.index');
    }
    
    public function create()
    {
        $artikels = Artikel::all();
        return view('dashboard.dokumenartikel.create', compact('artikels'));
    }
    
    public function store(Request $request)
    {

        // dd($request->all());
        $validateData = $request->validate([
            'nama' => 'required',
            'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:5048',
            'keterangan' => 'nullable',
            'artikel_id' => 'required',
        ]);

        if($request->hasFile('file')){
            $validateData['file'] = $request->file('file')->store('files');
        }

        dokumenartikel::create($validateData);
        return 'ok';
    }
    
    public function edit(dokumenartikel $dokumenartikel)
    {
        return view('dashboard.dokumenartikel.edit',compact('dokumenartikel'));
    }

    public function update(Request $request, dokumenartikel $dokumenartikel)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:1048',
            'keterangan' => 'nullable',
            'artikel_id' => 'required',
        ]);

        if($request->file('file')) 
        {
            $file = $request->file('file');
            $filename = time() . '.' . $request->file('file')->extension();
            $filePath = public_path() . '/files/uploads/';
            $file->move($filePath, $filename);
        }
         dokumenartikel::where('id', $dokumenartikel->id)
            ->update($validateData);
    }

    public function destroy(dokumenartikel $dokumenartikel)
    {
        dokumenartikel::destroy($dokumenartikel->id);
        return redirect(route('dokumenartikel.index'));
    }
}