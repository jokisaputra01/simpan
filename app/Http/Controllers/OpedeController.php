<?php

namespace App\Http\Controllers;

use App\Models\Opede;
use App\Models\Kategori;
use Illuminate\Http\Request;

class OpedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opedes = Opede::all();
        return view('dashboard.opd.index',compact('opedes'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategories = Kategori::all();
        return view('dashboard.opd.create', compact('kategories'));
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
            'nama' => 'required',
            'pic' => 'required',
        ]); 
        $validateData['user_id'] = auth()->user()->id;
        Opede::create($validateData);
        return redirect(route('opd.index'));
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
        $opede = Opede::findOrFail($id);
        return view('dashboard.opd.edit',compact('opede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            "nama"=>$request->nama,
            "pic"=>$request->pic,
        ];
        Opede::where('id', $id)->update($update);
        return redirect(route('opd.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Opede::destroy($id);
        return redirect(route('opd.index'));
    }
}
