<?php

namespace App\Http\Controllers;

use App\Models\dokumenartikel;
use Illuminate\Http\Request;

class DokumenArtikelPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dokumenartikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dokumenartikel  $dokumenartikel
     * @return \Illuminate\Http\Response
     */
    public function show(dokumenartikel $dokumenartikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dokumenartikel  $dokumenartikel
     * @return \Illuminate\Http\Response
     */
    public function edit(dokumenartikel $dokumenartikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dokumenartikel  $dokumenartikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokumenartikel $dokumenartikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dokumenartikel  $dokumenartikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(dokumenartikel $dokumenartikel)
    {
        //
    }
}
