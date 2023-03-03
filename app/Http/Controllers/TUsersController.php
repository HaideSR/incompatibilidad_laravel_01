<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Session;

class TUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $nivel = $request->query('nivel');
      $nivel = $nivel == 'FUNCIONARIO' ? $nivel : 'ADMIN';

      $ci = $request->query('ci');
      $ci = $ci ? $ci : null;

      if($ci){
         $usuarios = User::select('t_usuarios.*', 'f.nombres', 'f.numero_ci')
            ->leftJoin('t_funcionario as f', 't_usuarios.id', '=', 'f.id_usuario')
            // ->where('t_usuarios.nivel', $nivel)
            ->where('f.numero_ci', "LIKE", "%{$ci}%")
            ->get();
      }else{
         $usuarios = User::select('t_usuarios.*', 'f.nombres', 'f.numero_ci')
         ->leftJoin('t_funcionario as f', 't_usuarios.id', '=', 'f.id_usuario')
         ->where('t_usuarios.nivel', $nivel)
         ->get();
      }

      return view('usuario.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      if( !Session::get('isAdmin') ) return;
      $request->validate([
         'email' => 'required|email|unique:t_usuarios',
         'password' => 'required|string|min:6',
      ]);
      $user = User::create([
         'email'     => $request->email,
         'password'  => Hash::make($request->password),
         'estado'    => '1',
         'confirmado' => '1',
         'nivel'     => 'ADMIN'
      ]);
      $request->validate([
         'numero_ci' => 'required|unique:t_funcionario',
      ]);
      try {
         $func = new Funcionario();
         $func->id_usuario = $user->id;
         $func->numero_ci = $request->get('numero_ci');
         $func->apellido_paterno = $request->get('apellido_paterno');
         $func->apellido_materno = $request->get('apellido_materno');
         $func->nombres = $request->get('nombres');
         $func->fecha_registro = now();
         $func->save();
      } catch (\Throwable $th) {
         $usr = User::findOrFail($user->id);
         $usr->delete();
      }
      
      return redirect('/usuarios');
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

    public function edit($id){
      $usuario = User::select('t_usuarios.*', 'f.nombres', 'f.apellido_paterno', 'f.apellido_materno', 'f.numero_ci')
         ->leftJoin('t_funcionario as f', 't_usuarios.id', '=', 'f.id_usuario')
         ->where('t_usuarios.id', $id)
         ->first();
      return view('usuario.edit')->with('usuario', $usuario);
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
      $fun = Funcionario::firstWhere('id_usuario', $id);
      if($fun){
         $fun->delete();
      }
      $user = User::findOrFail($id);
      $user->delete();
      return redirect('/usuarios');
    }
}
