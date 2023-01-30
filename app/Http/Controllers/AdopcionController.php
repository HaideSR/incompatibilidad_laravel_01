<?php

namespace App\Http\Controllers;

use App\Models\Adopcion;
use App\Models\Funcionario;
use App\Models\Parentesco;
use Illuminate\Http\Request;

class AdopcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adopciones = Adopcion::select('t_re_adopcion.id','t_re_adopcion.nombres','t_re_adopcion.apellido_paterno',
        't_re_adopcion.apellido_materno','f.nombres as nombre','p.parentesco')
        ->join('t_funcionario as f','t_re_adopcion.id_funcionario','=','f.id')
         ->join('t_parentescos as p','t_re_adopcion.id_parentesco','=','p.id')
       
         ->paginate(5);

        //return view('consaguinidad.index',['t_consaguinidad'=>$consaguinidad]);
        return view('adopcion.index',compact('adopciones'));
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
        ->where('tp.tipo_parentesco', '=', 'Adopcion')
        ->get();
        $funcionarios = Funcionario::all();
        return view('adopcion.create',compact('parentescos','funcionarios'));
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
        $adopcion = request()->except('_token');
        Adopcion::insert($adopcion);
      //   return redirect()->action([AdopcionController::class, 'index']);
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
    public function edit($id)
    {
        //
        $adopcion = Adopcion::findorFail($id);
        $parentescos = Parentesco::select('t_parentescos.id','t_parentescos.parentesco')
                                   ->join('tipo_parentescos as tp','t_parentescos.id_tipoParentesco','=','tp.id')
                                   ->where('tp.tipo_parentesco', '=', 'adopcion')
                                   ->get();
        $funcionarios = Funcionario::all();
        
        return view('adopcion.edit')
               ->with('parentescos',$parentescos)
               ->with('funcionarios', $funcionarios)
               ->with('adopcion', $adopcion);
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
        $adopcion = Adopcion::findOrFail($id);
        $adopcion->nombres = $request->nombres;
        $adopcion->apellido_paterno = $request->apellido_paterno;
        $adopcion->apellido_materno = $request->apellido_materno;
        $adopcion->id_funcionario = $request->id_funcionario;
        $adopcion->id_parentesco = $request->id_parentesco;
        $adopcion->save();
      //   return redirect()->action([AdopcionController::class, 'index']);
         return redirect('/funcionario/'.$adopcion->id_funcionario);
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
        $adopcion = Adopcion::findOrFail($id);
        $adopcion->delete();
        return redirect()->back();
      //   return redirect()->action([AdopcionController::class, 'index']);
    }
}
