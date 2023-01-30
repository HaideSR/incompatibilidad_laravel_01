<?php

namespace App\Http\Controllers;

use App\Models\tipo_parentesco;
use Illuminate\Http\Request;

class TipoParentescoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipo_parentescos=tipo_parentesco::paginate(5);

        return view('tipo_parentesco.index', compact('tipo_parentescos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo_parentesco.create');
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
        $TipoParentesco = request()->except('_token');
        tipo_parentesco::insert($TipoParentesco);
        return redirect()->action([TipoParentescoController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipo_parentesco  $tipo_parentesco
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_parentesco $tipo_parentesco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipo_parentesco  $tipo_parentesco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipoParentescos = tipo_parentesco::findOrFail($id);
        return view('tipo_parentesco.edit', ['tipo_parentescos' => $tipoParentescos]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipo_parentesco  $tipo_parentesco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tipoParentescos = tipo_parentesco::findOrFail($id);
        $tipoParentescos-> tipo_parentesco= $request->tipo_parentesco;
        $tipoParentescos->save();
        return redirect()->action([TipoParentescoController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipo_parentesco  $tipo_parentesco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tipoParentescos = tipo_parentesco::findOrFail($id);
        $tipoParentescos->delete();
        
        return redirect()->action([TipoParentescoController::class, 'index']);
    }
}
