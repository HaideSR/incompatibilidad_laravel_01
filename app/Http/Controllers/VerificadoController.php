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
    public function showDocs(Request $request, $archivo)
    {
        $host = request()->getSchemeAndHttpHost();
        $url = "{$host}/declaraciones/".$archivo;
        $fileContents = file_get_contents($url);
        $base64 = base64_encode($fileContents);

        $data = ["error" => false,
        "message" => 'Se encontro el archivo.',
        "response" => [
            "description" => $archivo,
            "base64" => $base64,
        ],
        "status" => 200,
        ];
        return response()->json($data);
    }

    public function notificationDocs(Request $request,$archivo,$id)
    {
        // dd($request);
        $data = ["error" => false,
        "message" => 'Se encontro el archivo.',
        "response" => [
            "description" => '$archivo',
        ],
        "status" => 200,
        ];
        return response()->json($data);
    }

    public function index()
    {
        //
        $t_estado_declaracion = Verificado::select('t_estado_verificacion.id', 't_estado_verificacion.codigo','f.numero_ci','t_estado_verificacion.fecha'
                      ,'md.motivo','t_estado_verificacion.archivo','t_estado_verificacion.estado_proceso')
                                    ->join('t_funcionario as f','t_estado_verificacion.id_funcionario','=','f.id')
                                    ->join('t_motivo_declaracion as md','t_estado_verificacion.id_motivodeclaracion','=','md.id')
                                    ->orderBy('id', 'DESC')
                                    ->get();

                                    $t_estado_declaracion = $t_estado_declaracion->map(function ($item) {
                                        $item->permiteAprobar = false;
                                        $item->aprovationUrl = null;
                                        $binnacleId = session('binnacleId');
                                        if($item->archivo && $binnacleId){
                                            $item->permiteAprobar = true;
                                            $host = request()->getSchemeAndHttpHost();
                                            // ======url contruida=====
                                            $urlRedirectClient = $host;
                                            $urlServiceDocument = $host.'/lecturarDocumento/'.$item->archivo;
                                            $urlServiceNotif = "{$host}/notificar/aprobacion/".$item->archivo.'/'.$item->id;

                                            // solo tenia q ser estas 2 lineas, pero no tenias ninguno de estoy valores anteriores, yo estoy haciendo cada uno.
                                            // incluso te pse codigo
                                            // eso es lo de variables de acceso con ciudadania verdad?
                                            $urlOrion =env('VUE_APP_C_DIGITAL_URL');
                                            // si.. la ruta q se arma es la siguiente de abajo... pero ya debias te tener preparado... todos su valores...
                                            // y pss no habia.. yo termine preparandotelo...
                                            // si debi insistir en que me revises el codigo, crei que con lo que me habias pedido ya estaba, bueno ni modo
                                            //mañana ire a decirle al ingeniero que el siguiente semestre nomas le presentare, no te preocuoes ya hiciste mucho la verdad,
                                            // no imagine que faltaban esa variables.

                                            // solo dile q te retrasaste
                                            // serena morena, calmanes montes
                                            //no es eso sino que el ingenieor fue directo y me dijo que eso es lo que era importate a la licenciada mayra debo mostrarle igual
                                            //para mic arta el uing velasquez dijo que si llebaba la carta todo estaria correcto.
                                            
                                            $item->aprovationUrl = "{$urlOrion}/?urlRedirectClient={$urlRedirectClient}&urlServiceDocument={$urlServiceDocument}&urlNotificationDocument={$urlServiceNotif}&binnacleId={$binnacleId}";
                                            // ===========
                                        }
                                        return $item;
                                    });
                                        // $url = session('binnacleId');
                                   return view('subir_declaracion.index', compact('t_estado_declaracion'));
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
