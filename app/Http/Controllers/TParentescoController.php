<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Parentesco;
use App\Models\tipo_parentesco;
use App\Models\t_parentesco;
use Illuminate\Http\Request;

class TParentescoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $users = User::select('user.id', 'user.name', 'user.email', 'user.title', 'timezones.name as timezone')
              //  ->join('timezones', 'user.timezone', 'timezones.id')
              //  ->latest()
              //  ->paginate(5);

        $datosParentesco = Parentesco::select('t_parentescos.id','t_parentescos.parentesco','gr.grados','tp.tipo_parentesco')
                                    ->join('t_grado as gr','t_parentescos.id_grado','=','gr.id')
                                    ->join('tipo_parentescos as tp','t_parentescos.id_tipoParentesco','=','tp.id')
                                    ->paginate(15);

                                   return view('parentesco.index',['t_parentescos'=>$datosParentesco]);
        //return view('parentesco.index', $datosParentesco);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Grados = Grado::all();
        $Tipo_parentescos = tipo_parentesco::all();
        return view('parentesco.create',compact('Grados','Tipo_parentescos'));

        
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
        $datosParentesco = request()->except('_token');
        Parentesco::insert($datosParentesco);
        return redirect()->action([TParentescoController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\t_parentesco  $t_parentesco
     * @return \Illuminate\Http\Response
     */
    public function show(t_parentesco $t_parentesco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\t_parentesco  $t_parentesco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $parentescos = Parentesco::findorFail($id);
        $tipo_parentescos = tipo_parentesco::all();
        $grados = Grado::all();
        
        return view('parentesco.edit')
               ->with('tipo_parentescos',$tipo_parentescos)
               ->with('grados', $grados)
               ->with('parentescos', $parentescos);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\t_parentesco  $t_parentesco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $parentescos = Parentesco::findOrFail($id);
        $parentescos->parentesco = $request->parentesco;
        $parentescos->id_tipoParentesco = $request->id_tipoParentesco;
        $parentescos->id_grado = $request->id_grado;
        $parentescos->save();
        return redirect()->action([TParentescoController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\t_parentesco  $t_parentesco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $parentescos = Parentesco::findOrFail($id);
        $parentescos->delete();
        
        return redirect()->action([TParentescoController::class, 'index']);
    }
}
