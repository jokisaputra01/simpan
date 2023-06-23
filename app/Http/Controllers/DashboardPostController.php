<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opede;
use Illuminate\Http\RedirectResponse;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opedes = Opede:: all();
        return view('dashboard.opd.index',compact('opedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.opd.create');
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
            'pic' => 'required|max:255',
        ]);
        $validateData['user_id'] = auth()->user()->id;
        Opede::create($validateData);
        return redirect(route('opd.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opede  $opede
     * @return \Illuminate\Http\Response
     */
    public function edit(Opede $opede, $id)
    {       
        $opede = Opede::findOrFail($id);
        return view('dashboard.opd.edit', compact('opede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opede  $opede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opede $opede)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',   
            'pic' => 'required|max:255',
        ]);
        $validateData['user_id'] = auth()->user()->id;
        Opede::where('id', $opede->id)
            ->update($validateData);
        return redirect(route('opd.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opede  $opede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opede $opede, $id)
    {
        Opede::destroy($opede->id);
        return redirect(route('opd.index'));
    }
}
