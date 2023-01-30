<?php

namespace App\Http\Controllers;

use App\Models\Conyugue;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class ConyugueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $conyugue = Conyugue::select('t_conyugue.id','t_conyugue.numero_ci','t_conyugue.complemento','t_conyugue.expedido',
        't_conyugue.apellido_paterno','t_conyugue.apellido_materno','t_conyugue.nombres as nombre','t_conyugue.direccion','t_f.nombres')
                                    ->join('t_funcionario as t_f','t_conyugue.id_funcionario','=','t_f.id')
                                    ->paginate(5);
        //$datos['t_parentescos']=Parentesco::paginate(5);

                                   return view('conyugue.index',compact('conyugue'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $funcionarios = Funcionario::all();
        return view('conyugue.create',["funcionarios"=>$funcionarios]);
        //return view("blog", ["posts"=>$posts]);

        
       // return view('conyugue.create');
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
         $datosConyugue = request()->except('_token');
         Conyugue::insert($datosConyugue);
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
        $conyugues = Conyugue::findOrFail($id);
        return view('conyugue.edit', ['t_conyugue' =>$conyugues]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        $conyugues = Conyugue::findOrFail($id);
        $conyugues->numero_ci = $request->numero_ci;
        $conyugues->complemento = $request->complemento;
        $conyugues->expedido = $request->expedido;
        $conyugues->apellido_paterno = $request->apellido_paterno;
        $conyugues->apellido_materno = $request->apellido_materno;
        $conyugues->nombres = $request->nombres;
        $conyugues->direccion = $request->direccion;
        $conyugues->save();
      //   return redirect()->action([ConyugueController::class, 'index']);
         return redirect('/funcionario/'.$conyugues->id_funcionario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $conyugue = Conyugue::findOrFail($id);
      $conyugue->delete();
      return redirect()->back();
      // return redirect()->action([ConyugueController::class, 'index']);
      // return redirect('/funcionario/'.$request->query('idF'));
    }
}
