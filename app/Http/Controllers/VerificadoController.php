<?php

namespace App\Http\Controllers;
use App\Models\MotivoDeclaracion;
use App\Models\Verificado;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;

class VerificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $t_estado_declaracion = Verificado::select('t_estado_verificacion.id', 't_estado_verificacion.codigo','f.numero_ci','t_estado_verificacion.fecha'
                      ,'md.motivo','t_estado_verificacion.archivo','t_estado_verificacion.estado_proceso')
                                    ->join('t_funcionario as f','t_estado_verificacion.id_funcionario','=','f.id')
                                    ->join('t_motivo_declaracion as md','t_estado_verificacion.id_motivodeclaracion','=','md.id')
                                    ->orderBy('id', 'DESC')
                                    ->get();

                                   return view('subir_declaracion.index',['t_estado_declaracion'=>$t_estado_declaracion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = Session::get('id_funcionario');
        $funcionario = Funcionario::find($id);
        $motivos = MotivoDeclaracion::all();
        return view('subir_declaracion.create',compact('funcionario','motivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      $datos = request()->except('_token');
      $datos['fecha'] = now();
      $datos['codigo'] = date("md").'-'.Str::upper(Str::random(5));
      $datos['estado_aprobacion_cd'] = false;
      $datos['estado_proceso'] = 'INICIADO';
      $datos['estado_tramite'] = 'EN_PROCESO';
      $datos['id_funcionario']=Session::get('id_funcionario');

      //guardar en local
      $fileHash = sha1_file( $request->archivo->path() );
      $request->archivo->move(public_path('declaraciones'), $fileHash.'.pdf');
      $datos['archivo'] = 'declaraciones/'.$fileHash.'.pdf';
      Verificado::insert($datos);
      return redirect('/subir_declaracion');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $rev = Verificado::findOrFail($id);
      $rev->delete();
      return redirect('/subir_declaracion');
    }
}
