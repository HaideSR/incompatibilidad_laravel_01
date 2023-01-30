<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         
         $denuncias = Denuncia::select('t_denuncia.id','t_denuncia.numero_ci','t_denuncia.fecha_denuncia',
         't_denuncia.nombres_apellidos','t_denuncia.fiscalia_otro','t_denuncia.direccion_jefatura_unidad',
         't_denuncia.detalles')
                                    ->join('t_funcionario as f','t_denuncia.id_funcionario','=','f.id')
                                    ->paginate(15);

                                   return view('denuncia.index',['t_denuncias'=>$denuncias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // return view('denuncia.create');
       $funcionarios = Funcionario::all();
        return view('denuncia.create',["funcionarios"=>$funcionarios]);
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
        $datosdenuncia = request()->except('_token');
        Denuncia::insert($datosdenuncia);
        return redirect()->action([DenunciaController::class, 'index']);
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
        $denuncia = Denuncia::findorFail($id);
        $funcionarios = Funcionario::all();
        
        return view('denuncia.edit')
               ->with('funcionarios', $funcionarios)
               ->with('denuncia', $denuncia);
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
        $denuncia = denuncia::findOrFail($id);
        $denuncia->numero_ci = $request->numero_ci;
        $denuncia->fecha_denuncia = $request->fecha_denuncia;
        $denuncia->nombres_apellidos = $request->nombres_apellidos;
        $denuncia->fiscalia_otro = $request->fiscalia_otro;
        $denuncia->direccion_jefatura_unidad = $request->direccion_jefatura_unidad;
        $denuncia->detalles = $request->detalles;
        //$denuncia->id_parentesco = $request->id_parentesco;
        $denuncia->save();
        //return redirect('/funcionario/'.$denuncia->id_funcionario);
        return redirect()->action([DenunciaController::class, 'index']);
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
        $denuncia = denuncia::findOrFail($id);
        $denuncia->delete();
        return redirect()->back();
    }
}
