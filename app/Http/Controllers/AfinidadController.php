<?php

namespace App\Http\Controllers;

use App\Models\Afinidad;
use App\Models\Funcionario;
use App\Models\Parentesco;
use Illuminate\Http\Request;

class AfinidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $afinidades = Afinidad::select('t_afinidad.id','t_afinidad.nombres','t_afinidad.apellido_paterno',
        't_afinidad.apellido_materno','f.nombres as nombre','p.parentesco')
        ->join('t_funcionario as f','t_afinidad.id_funcionario','=','f.id')
         ->join('t_parentescos as p','t_afinidad.id_parentesco','=','p.id')
       
         ->paginate(5);

        //return view('consaguinidad.index',['t_consaguinidad'=>$consaguinidad]);
        return view('afinidad.index',compact('afinidades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parentescos = Parentesco::select('t_parentescos.id','t_parentescos.parentesco')
        ->join('tipo_parentescos as tp','t_parentescos.id_tipoParentesco','=','tp.id')
        ->where('tp.tipo_parentesco', '=', 'Afinidad')
        ->get();
        $funcionarios = Funcionario::all();
        return view('afinidad.create',compact('parentescos','funcionarios'));
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
        //$datosAfinidad = request()->except('_token');
        //Afinidad::insert($datosAfinidad);
        //return response()->json($datosAfinidad);
        $afinidad = request()->except('_token');
        Afinidad::insert($afinidad);
        return redirect('/funcionario/'.$request->get('id_funcionario'));
      //   return redirect()->action([AfinidadController::class, 'index']);
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
        $afinidad = Afinidad::findorFail($id);
        $parentescos = Parentesco::select('t_parentescos.id','t_parentescos.parentesco')
                                   ->join('tipo_parentescos as tp','t_parentescos.id_tipoParentesco','=','tp.id')
                                   ->where('tp.tipo_parentesco', '=', 'Afinidad')
                                   ->get();
        $funcionarios = Funcionario::all();
        
        return view('afinidad.edit')
               ->with('parentescos',$parentescos)
               ->with('funcionarios', $funcionarios)
               ->with('afinidad', $afinidad);
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
        $afinidad = Afinidad::findOrFail($id);
        $afinidad->nombres = $request->nombres;
        $afinidad->apellido_paterno = $request->apellido_paterno;
        $afinidad->apellido_materno = $request->apellido_materno;
        $afinidad->id_parentesco = $request->id_parentesco;
        $afinidad->save();
      //   return redirect()->action([AfinidadController::class, 'index']);
         return redirect('/funcionario/'.$afinidad->id_funcionario);
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
        $afinidad = Afinidad::findOrFail($id);
        $afinidad->delete();
        return redirect()->back();
      //   return redirect()->action([AfinidadController::class, 'index']);
    }
}
