<?php

namespace App\Http\Controllers;
use App\Models\TipoCausalesIncompatibilidad;
use App\Models\Causal;
use Illuminate\Http\Request;

class CausalIncompatibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request ){
      $idTipoCausal = $request->query('idTipoCausal');
      $tipocausal = TipoCausalesIncompatibilidad::find($idTipoCausal);

      return view('causal_incompatibilidad.create')
         ->with('tipocausal', $tipocausal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      $causal = request()->except('_token');
      Causal::insert($causal);
      return redirect('/funcionario/'.$request->get('id_funcionario'));
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
    public function edit($id){
      $causal = Causal::select('t_causal_incompatibilidad.id as id', 't_causal_incompatibilidad.id_funcionario','t_causal_incompatibilidad.estado' , 't_causal_incompatibilidad.descripcion', 'tp.incompatibilidad', 'tp.tipo_actividad')
                  ->join('tipo_causales_incompatibilidades as tp','tp.id','=','t_causal_incompatibilidad.id_tipo_causal')
                  ->where('t_causal_incompatibilidad.id', '=', $id)->first();
      return view('causal_incompatibilidad.edit')->with('causal', $causal);
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
      $causal = Causal::findOrFail($id);
      $causal->estado = $request->estado;
      $causal->descripcion = $request->descripcion;
      $causal->save();
      return redirect('/funcionario/'.$causal->id_funcionario);
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
    }
}
