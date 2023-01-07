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
use App\Models\TipoCausalesIncompatibilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Session;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::select('t_funcionario.id','t_funcionario.numero_ci','t_funcionario.complemento'
        ,'t_funcionario.expedido','t_funcionario.nombres','t_funcionario.apellido_paterno',
        't_funcionario.apellido_materno')
        //->join('t_fiscalias as tf','t_funcionario.id_fiscalia','=','tf.id')
        ->join('t_usuarios as us','t_funcionario.id_usuario','=','us.id')
        ->paginate(5);
       return view('funcionario.index', compact('funcionarios'));
    }
   public function createPDF(Request $request){
      $ID = $request->query('idF');
      list($funcionario, $conyugues,
       $consaguinidades, $afinidades,
       $adopciones, $si_no,
       $parientes_mp, $causalRespuestas, $tiposCausales) = $this->getDatosFuncionario($ID);

      $fileNamePdf = $funcionario->nombres;
      // return view('funcionario.pdf.index',
      //    compact('funcionario', 'conyugues', 'consaguinidades', 'afinidades',
      //    'adopciones', 'si_no', 'parientes_mp', 'causalRespuestas', 'tiposCausales'));
      $pdf = PDF::loadView(
         'funcionario.pdf.index',
         compact('funcionario', 'conyugues', 'consaguinidades', 'afinidades', 'adopciones', 'si_no', 'parientes_mp', 'causalRespuestas', 'tiposCausales')
      );
      return $pdf->download('Declaración jurada de '.$fileNamePdf.'.pdf');
      // return $pdf->stream('Declaración jurada de '.$fileNamePdf.'.pdf');
   }
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Usuario::all();
        return view('funcionario.create',compact('usuario'));
    }
    public function getDatosFuncionario($id){
      $funcionario = Funcionario::find($id);
      $conyugue = Conyugue::select()->where('id_funcionario', '=', $id)->get();
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
      return [$funcionario, $conyugue, $consaguinidad, $afinidad, $adopcion, $si_no, $parientes_mp, $causal, $tiposCausales];
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
      if(!Session::get('isAdmin') ){
         $datosFuncionario['id_usuario'] = Session::get('id');
      }
      // dd( $datosFuncionario );
      Funcionario::insert($datosFuncionario);
      return redirect()->action([FuncionarioController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
      $funcionario = Funcionario::find($id);
      $conyugue = Conyugue::select()->where('id_funcionario', '=', $id)->get();
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

      return view('funcionario.show')
         ->with('funcionario', $funcionario)
         ->with('conyugue', $conyugue)
         ->with('consaguinidad', $consaguinidad)
         ->with('afinidad', $afinidad)
         ->with('adopcion', $adopcion)
         ->with('si_no', $si_no)
         ->with('parientes_mp', $parientes_mp)
         ->with('causalRespuestas', $causal)
         ->with('tiposCausales', $tiposCausales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
      $funcionario = Funcionario::find($id);
      return view('funcionario.edit')->with('funcionario', $funcionario);      //forma 2
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
        $t_funcionario->fiscalia_otro = $request->fiscalia_otro;
        $t_funcionario->unidad = $request->unidad;
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
        //
    }
    /**
     */
    function __construct() {
    }
}
