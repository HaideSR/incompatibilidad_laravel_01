<?php

namespace App\Http\Controllers;

use App\Models\ParientesMp;
use Illuminate\Http\Request;

class ParientesMpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parientes_mp = ParientesMp::select('t_parientes_mp.id','t_parientes_mp.nombre','t_parientes_mp.apellido_paterno','t_parientes_mp.apellido_materno',
        't_parientes_mp.parentesco','t_parientes_mp.fiscalia_otro','t_parientes_mp.direccion_jefatura_unidad')
                                    ->join('t_funcionario as t_f','t_parientes_mp.id_funcionario','=','t_f.id')
                                    ->join('t_mp_si_no as t_sino','t_parientes_mp.id_mp_si_no','=','t_sino.id')
                                    ->paginate(5);
        //$datos['t_parentescos']=Parentesco::paginate(5);

                                   return view('parientes_mp.index',compact('parientes_mp'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('parientes_mp.create');
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
        $parientes_mp = request()->except('_token');
        ParientesMp::insert($parientes_mp);
      //   return redirect()->action([ParientesMpController::class, 'index']);
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
      $parienteMp = ParientesMp::findorFail($id);
      return view('parientes_mp.edit')
               ->with('parienteMp', $parienteMp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      $pariente = ParientesMp::findOrFail($id);
      $pariente->nombre = $request->nombre;
      $pariente->apellido_paterno = $request->apellido_paterno;
      $pariente->apellido_materno = $request->apellido_materno;
      $pariente->parentesco = $request->parentesco;
      $pariente->direccion_jefatura_unidad = $request->direccion_jefatura_unidad;
      $pariente->fiscalia_otro = $request->fiscalia_otro;
      $pariente->save();
      return redirect('/funcionario/'.$pariente->id_funcionario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pariente = ParientesMp::findOrFail($id);
      $pariente->delete();
      return redirect()->back();
    }
}
