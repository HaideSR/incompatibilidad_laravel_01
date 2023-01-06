<?php

namespace App\Http\Controllers;

use App\Models\TipoCausalesIncompatibilidad;
use Illuminate\Http\Request;

class TipoCausalesIncompatibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipos = TipoCausalesIncompatibilidad::all();
      return view('tipos_causal_incompatibilidad.index')->with('tipos',$tipos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('tipos_causal_incompatibilidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipo = request()->except('_token');
      TipoCausalesIncompatibilidad::insert($tipo);
      return redirect('/tipos_causal_incompatibilidad/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoCausalesIncompatibilidad  $tipoCausalesIncompatibilidad
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCausalesIncompatibilidad $tipoCausalesIncompatibilidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoCausalesIncompatibilidad  $tipoCausalesIncompatibilidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $tipo = TipoCausalesIncompatibilidad::findorFail($id);
      return view('tipos_causal_incompatibilidad.edit')->with('tipo',$tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoCausalesIncompatibilidad  $tipoCausalesIncompatibilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      $tipo = TipoCausalesIncompatibilidad::findOrFail($id);
      $tipo->incompatibilidad = $request->incompatibilidad;
      $tipo->tipo_actividad = $request->tipo_actividad; 
      $tipo->save();
      return redirect('/tipos_causal_incompatibilidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoCausalesIncompatibilidad  $tipoCausalesIncompatibilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCausalesIncompatibilidad $tipoCausalesIncompatibilidad)
    {
        //
    }
}
