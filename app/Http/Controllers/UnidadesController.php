<?php

namespace App\Http\Controllers;

use App\Models\Unidades;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $unidades = Unidades::all();
      return view('unidades.index')->with('unidades', $unidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('unidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $unidad = request()->except('_token');
      Unidades::insert($unidad);
      return redirect('/unidades/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function show(Unidades $unidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $unidad = Unidades::findOrFail($id);
      return view('unidades.edit')->with('unidad', $unidad); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $unidad = Unidades::findOrFail($id);
      $unidad->nombre = $request->nombre;
      $unidad->save();
      return redirect('/unidades/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $unidad = Unidades::findOrFail($id);
      $unidad->delete();
      return redirect('/unidades/');
    }
}
