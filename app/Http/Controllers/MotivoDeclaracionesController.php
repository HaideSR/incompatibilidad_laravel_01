<?php

namespace App\Http\Controllers;

use App\Models\MotivoDeclaracion;
use Illuminate\Http\Request;

class MotivoDeclaracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $motivodeclaraciones = MotivoDeclaracion::all();
        return view('motivo_declaracion.index')
        ->with('motivodeclaraciones',$motivodeclaraciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('motivo_declaracion.create');
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
        $motivodeclaraciones = request()->except('_token');
        MotivoDeclaracion::insert($motivodeclaraciones);
        return redirect()->action([MotivoDeclaracionesController::class, 'index']);

       
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
        //

        $motivodeclaraciones = MotivoDeclaracion::findOrFail($id);
        return view('motivo_declaracion.edit', ['motivodeclaraciones' => $motivodeclaraciones]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $motivodeclaraciones = MotivoDeclaracion::findOrFail($id);
        $motivodeclaraciones-> motivo= $request->motivo;
        $motivodeclaraciones->save();
        return redirect()->action([MotivoDeclaracionesController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $motivodeclaraciones = MotivoDeclaracion::findOrFail($id);
        $motivodeclaraciones->delete();
        
        return redirect()->action([MotivoDeclaracionesController::class, 'index']);
    }
}
