<?php

namespace App\Http\Controllers;

use App\Models\Adopcion;
use App\Models\Afinidad;
use App\Models\Causal;
use App\Models\Funcionario;
use App\Models\Usuario;
use App\Models\Conyugue;
use App\Models\Consaguinidad;
use App\Models\MpSiNo;
use App\Models\ParientesMp;
use App\Models\Fiscalias;
use App\Models\Cargos;
use App\Models\Unidades;
use App\Models\TipoCausalesIncompatibilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use PDF;
use Session;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request){
      $ci = $request->get('ci');
      if($ci){
         // $funcionarios = Funcionario::where("numero_ci", "LIKE", "%{$ci}%")
         $funcionarios = Funcionario::select('t_funcionario.id','t_funcionario.numero_ci','t_funcionario.complemento'
            ,'t_funcionario.expedido','t_funcionario.nombres','t_funcionario.apellido_paterno',
            't_funcionario.apellido_materno')
            ->where("t_funcionario.numero_ci", "LIKE", "%{$ci}%")
            ->join('t_usuarios as us','t_funcionario.id_usuario','=','us.id')
            ->paginate(10); 
         return view('funcionario.index', compact('funcionarios'));
      }
      $funcionarios = Funcionario::select('t_funcionario.id','t_funcionario.numero_ci','t_funcionario.complemento'
      ,'t_funcionario.expedido','t_funcionario.nombres','t_funcionario.apellido_paterno',
      't_funcionario.apellido_materno')
      ->join('t_usuarios as us','t_funcionario.id_usuario','=','us.id')
      ->paginate(10);
      return view('funcionario.index', compact('funcionarios'));
   }
   public function createPDF(Request $request){
      $ID = $request->query('idF');
      list($funcionario, $conyugues,
       $consaguinidades, $afinidades,
       $adopciones, $si_no,
       $parientes_mp, $causalRespuestas, $tiposCausales,
        $fiscalia, $unidad, $cargo) = $this->getDatosFuncionario($ID);
      $firma = $this->getFirma($funcionario->numero_ci);
      $fileNamePdf = $funcionario->nombres;
      $pdf = PDF::loadView(
         'funcionario.pdf.index',
         compact('funcionario', 'conyugues', 'consaguinidades', 'afinidades', 'adopciones',
          'si_no', 'parientes_mp', 'causalRespuestas', 'tiposCausales', 'unidad', 'fiscalia', 'cargo', 'firma')
      );
      // return $pdf->download('Declaración jurada de '.$fileNamePdf.'.pdf');
      return $pdf->stream('Declaración jurada de '.$fileNamePdf.'.pdf');
   }
    /**
     *
     * @return \Illuminate\Http\Response
     */
   private function getFirma($ci){
      // $URL_DOC = 'https://correspondencia-api-test.fiscalia.gob.bo/v1/personas/firmaFisicaId';
      // $URL_FIRMA_ID = 'https://correspondencia-api-test.fiscalia.gob.bo/v1/personas/obtener/firma';
      //1119323
      
      $URL_DOC = env('API_CORRESPONDENCIA').'/personas/firmaFisicaId';
      $URL_FIRMA_ID = env('API_CORRESPONDENCIA').'/personas/obtener/firma';
      $response = $this->getRequestExternal($URL_DOC, ['numeroDocumento'=> $ci]);
      if( $response ){
         $firmaFisicaId = $response['firmaFisicaId'];
         $resFirma = $this->getRequestExternal($URL_FIRMA_ID, ['firmaFisicaId'=> $firmaFisicaId] );
         if( $resFirma ){
            return $resFirma['firmaBase64'];
         }
      }
      return;
   }
   private function getRequestExternal($url, $params){
      $res = Http::withHeaders([
         'accept' => '*/*',
         'Content-Type' => 'application/json', 
      ])->post($url, $params);
      if($res['error'] == false && ($res['status'] == 200 || $res['status'] == 201)){
         return $res['response'];
      }
      return;
   }
    public function create()
    {
        $fiscalias = Fiscalias::all();
        $unidades = Unidades::all();
        $cargos = Cargos::all();
        
        return view('funcionario.create')
                  ->with('fiscalias', $fiscalias)
                  ->with('cargos', $cargos)
                  ->with('unidades', $unidades);
    }
    public function getDatosFuncionario($id){
      $funcionario = Funcionario::find($id);
      $conyugue = Conyugue::select()->where('id_funcionario', '=', $id)->get();
      $unidad = Unidades::select()->where('id', '=', $funcionario->id_unidad)->first();
      $cargo = Cargos::select()->where('id', '=', $funcionario->id_cargo)->first();
      $fiscalia = Fiscalias::select()->where('id', '=', $funcionario->id_fiscalia)->first();

      $consaguinidad = Consaguinidad::select('t_consaguinidad.id','t_consaguinidad.nombres','t_consaguinidad.apellido_paterno',
                                   't_consaguinidad.apellido_materno','p.parentesco')
                                    ->join('t_parentescos as p','t_consaguinidad.id_parentesco','=','p.id')
                                    ->where('id_funcionario', '=', $id)->get();

      $afinidad = Afinidad::select('t_afinidad.id','t_afinidad.nombres','t_afinidad.apellido_paterno',
                                    't_afinidad.apellido_materno','p.parentesco')
                                   ->join('t_parentescos as p','t_afinidad.id_parentesco','=','p.id')
                                   ->where('id_funcionario', '=', $id)->get();
      $adopcion = Adopcion::select('t_re_adopcion.id','t_re_adopcion.nombres','t_re_adopcion.apellido_paterno',
                                   't_re_adopcion.apellido_materno','p.parentesco')
                                    ->join('t_parentescos as p','t_re_adopcion.id_parentesco','=','p.id')
                                    ->where('id_funcionario', '=', $id)->get();
      $si_no = MpSiNo::select()->where('id_funcionario', '=', $id)->first();
      $parientes_mp = ParientesMp::select()->where('id_funcionario', '=', $id)->get();
      $causal = Causal::select()->where('id_funcionario', '=', $id)->get();
      $tiposCausales = TipoCausalesIncompatibilidad::all();
      return [$funcionario, $conyugue, $consaguinidad, $afinidad, $adopcion,
       $si_no, $parientes_mp, $causal, $tiposCausales, $fiscalia, $unidad, $cargo];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $datosFuncionario = request()->except('_token');
      $request->validate([
         'numero_ci' => 'required|unique:t_funcionario',
      ]);
      $datosFuncionario['fecha_registro'] = now();
      $isUserSession = Session::get('id');
      if(!Session::get('isAdmin') ){
         $datosFuncionario['id_usuario'] = $isUserSession;
      }
      $newFunc = Funcionario::insert($datosFuncionario);
      if(!Session::get('isAdmin') && $newFunc){
         $currenteFunc = $this->setSesionFuncionario($isUserSession);
         return redirect('/funcionario/'.$currenteFunc->id);
      }
      return redirect()->action([FuncionarioController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function setSesionFuncionario($id){
      $funcionario = Funcionario::select()->where('id_usuario', '=', $id)->first();
      Session::put('nombre', $funcionario->nombres);
      Session::put('id_funcionario', $funcionario->id);
      return $funcionario;
    }
    public function show($id){
      $funcionario = Funcionario::find($id);
      $conyugue = Conyugue::select()->where('id_funcionario', '=', $id)->get();
      $unidad = Unidades::select()->where('id', '=', $funcionario->id_unidad)->first();
      $cargo = Cargos::select()->where('id', '=', $funcionario->id_cargo)->first();
      $fiscalia = Fiscalias::select()->where('id', '=', $funcionario->id_fiscalia)->first();

      $consaguinidad = Consaguinidad::select('t_consaguinidad.id','t_consaguinidad.nombres','t_consaguinidad.apellido_paterno',
                                   't_consaguinidad.apellido_materno','p.parentesco')
                                    ->join('t_parentescos as p','t_consaguinidad.id_parentesco','=','p.id')
                                    ->where('id_funcionario', '=', $id)->get();

      $afinidad = Afinidad::select('t_afinidad.id','t_afinidad.nombres','t_afinidad.apellido_paterno',
                                  't_afinidad.apellido_materno','p.parentesco')
                                 ->join('t_parentescos as p','t_afinidad.id_parentesco','=','p.id')
                                 ->where('id_funcionario', '=', $id)->get();

      $adopcion = Adopcion::select('t_re_adopcion.id','t_re_adopcion.nombres','t_re_adopcion.apellido_paterno',
                                 't_re_adopcion.apellido_materno','p.parentesco')
                                  ->join('t_parentescos as p','t_re_adopcion.id_parentesco','=','p.id')
                                  ->where('id_funcionario', '=', $id)->get();
                                  
      $si_no = MpSiNo::select()->where('id_funcionario', '=', $id)->first();
      $parientes_mp = ParientesMp::select()->where('id_funcionario', '=', $id)->get();
      $causal = Causal::select()->where('id_funcionario', '=', $id)->get();
      $tiposCausales = TipoCausalesIncompatibilidad::all();
      $formularioCompleto = $this->verificaSiCompleto( $consaguinidad, $afinidad, $adopcion, $si_no, $parientes_mp );

      return view('funcionario.show')
         ->with('funcionario', $funcionario)
         ->with('conyugue', $conyugue)
         ->with('consaguinidad', $consaguinidad)
         ->with('afinidad', $afinidad)
         ->with('adopcion', $adopcion)
         ->with('si_no', $si_no)
         ->with('parientes_mp', $parientes_mp)
         ->with('causalRespuestas', $causal)
         ->with('fiscalia', $fiscalia)
         ->with('unidad', $unidad)
         ->with('cargo', $cargo)
         ->with('tiposCausales', $tiposCausales)
         ->with('formularioCompleto', $formularioCompleto);
    }

   private function verificaSiCompleto($consaguinidad, $afinidad, $adopcion, $si_no, $parientes_mp){
      if( $consaguinidad->isEmpty() &&
          $afinidad->isEmpty() && 
          $adopcion->isEmpty() &&
          $parientes_mp->isEmpty() &&
          !$si_no
         ){
         return false;
      }
      return true;
   }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
      $funcionario = Funcionario::find($id);
      $fiscalias = Fiscalias::all();
      $unidades = Unidades::all();
      $cargos = Cargos::all();
      return view('funcionario.edit')
            ->with('fiscalias', $fiscalias)
            ->with('unidades', $unidades)
            ->with('cargos', $cargos)
            ->with('funcionario', $funcionario);      //forma 2
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
        $t_funcionario = Funcionario::findOrFail($id);
        $t_funcionario->numero_ci = $request->numero_ci;
        $t_funcionario->complemento = $request->complemento;
        $t_funcionario->expedido = $request->expedido;
        $t_funcionario->apellido_paterno = $request->apellido_paterno;
        $t_funcionario->apellido_materno = $request->apellido_materno;
        $t_funcionario->nombres = $request->nombres;
        $t_funcionario->fecha_nacimiento = $request->fecha_nacimiento;
        $t_funcionario->direccion = $request->direccion;
        $t_funcionario->celular = $request->celular;
        $t_funcionario->id_fiscalia = $request->id_fiscalia;
        $t_funcionario->id_unidad = $request->id_unidad;
        $t_funcionario->id_cargo = $request->id_cargo;
        $t_funcionario->save();
        return redirect()->action([FuncionarioController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $fun = Funcionario::findOrFail($id);
      if($fun){
         $fun->delete();
      }
      return redirect('/funcionario');
    }
    /**
     */
    function __construct() {
    }
}
