<?php

namespace App\Http\Controllers;

use App\Models\Fiscalias;
use App\Models\UnidadCargo;
use Illuminate\Http\Request;

class UnidadCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $t_unidadCargos = UnidadCargo::select('t_unidad_cargo.id','t_unidad_cargo.unidad','t_unidad_cargo.cargo','tf.denominacion')
                                    ->join('t_fiscalias as tf','t_unidad_cargo.id_fiscalia','=','tf.id')
                                    ->paginate(5);
        //$datos['t_parentescos']=Parentesco::paginate(5);

                                   return view('unidad_cargo.index',compact('t_unidadCargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fiscalias = Fiscalias::all();
        return view('unidad_cargo.create',compact('fiscalias'));
        //return view('unidad_cargo.create');
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
        $unidad_cargo = request()->except('_token');
        UnidadCargo::insert($unidad_cargo);
         return redirect()->action([UnidadCargoController::class, 'index']);

     

         
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
        $unidad_cargo = UnidadCargo::findorFail($id);
        $fiscalias = Fiscalias::all();
        return view('unidad_cargo.edit')
               ->with('fiscalias',$fiscalias)
               ->with('unidad_cargo',$unidad_cargo);
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


        $unidad_cargo = UnidadCargo::findOrFail($id);
        $unidad_cargo->unidad = $request->unidad;
        $unidad_cargo->cargo = $request->cargo;
        $unidad_cargo->id_fiscalia = $request->id_fiscalia;
        $unidad_cargo->save();
        return redirect()->action([UnidadCargoController::class, 'index']);

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
        $unidad_cargo = UnidadCargo::findOrFail($id);
        $unidad_cargo->delete();
        
        return redirect()->action([UnidadCargoController::class, 'index']);
    }
}
