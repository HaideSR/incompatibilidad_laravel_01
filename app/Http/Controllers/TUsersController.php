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

class TUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      // $all_columns = Schema::getColumnListing('t_usuarios');
      // $exclude_columns = ['password', 'created_at', 'updated_at', 'id'];
      // $get_columns = 'id, email, estado, nivel'; // array_diff( $all_columns, $exclude_columns);
      // // echo dd($get_columns); 
      $usuarios = User::join('t_funcionario as f', 'f.id_usuario', '=', 't_usuarios.id')
                     ->where('t_usuarios.nivel', 'ADMIN')->get();
      // $usuarios = User::all();
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
      $fun = Funcionario::firstWhere('id_usuario', $id);
      if($fun){
         $fun->delete();
      }
      $user = User::findOrFail($id);
      $user->delete();
      return redirect()->back();
    }
}
