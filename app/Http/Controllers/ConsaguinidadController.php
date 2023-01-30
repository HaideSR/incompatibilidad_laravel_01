<?php

namespace App\Http\Controllers;

use App\Models\Consaguinidad;
use App\Models\Funcionario;
use App\Models\Parentesco;
use Illuminate\Http\Request;

class ConsaguinidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consaguinidad = Consaguinidad::select('t_consaguinidad.id','t_consaguinidad.nombres','t_consaguinidad.apellido_paterno',
                                   't_consaguinidad.apellido_materno','f.nombres as nombre','p.parentesco')
                                   ->join('t_funcionario as f','t_consaguinidad.id_funcionario','=','f.id')
                                    ->join('t_parentescos as p','t_consaguinidad.id_parentesco','=','p.id')
                                  
                                    ->paginate(5);

                                   //return view('consaguinidad.index',['t_consaguinidad'=>$consaguinidad]);
                                   return view('consaguinidad.index',compact('consaguinidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $parentescos = Parentesco::select('t_parentescos.id as id','t_parentescos.parentesco')
                                   ->join('tipo_parentescos as tp','t_parentescos.id_tipoParentesco','=','tp.id')
                                   ->where('tp.tipo_parentesco', '=', 'Consaguinidad')
                                   ->get();
                                   //echo $parentescos;
         // $parentescos = Parentesco::select();      
         $funcionarios = Funcionario::all();

        return view('consaguinidad.create',compact('parentescos','funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      $consaguinidad = request()->except('_token');
      Consaguinidad::insert($consaguinidad);
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
        $consaguinidad = Consaguinidad::findorFail($id);
        $parentescos = Parentesco::select('t_parentescos.id','t_parentescos.parentesco')
                                   ->join('tipo_parentescos as tp','t_parentescos.id_tipoParentesco','=','tp.id')
                                   ->where('tp.tipo_parentesco', '=', 'Consaguinidad')
                                   ->get();
        $funcionarios = Funcionario::all();
        
        return view('consaguinidad.edit')
               ->with('parentescos',$parentescos)
               ->with('funcionarios', $funcionarios)
               ->with('consaguinidad', $consaguinidad);
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
        $consaguinidad = Consaguinidad::findOrFail($id);
        $consaguinidad->nombres = $request->nombres;
        $consaguinidad->apellido_paterno = $request->apellido_paterno;
        $consaguinidad->apellido_materno = $request->apellido_materno;
        $consaguinidad->id_parentesco = $request->id_parentesco;
        $consaguinidad->save();
        return redirect('/funcionario/'.$consaguinidad->id_funcionario);
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
        $consaguinidad = Consaguinidad::findOrFail($id);
        $consaguinidad->delete();
        return redirect()->back();
      //   return redirect()->action([ConsaguinidadController::class, 'index']);
    }
}
