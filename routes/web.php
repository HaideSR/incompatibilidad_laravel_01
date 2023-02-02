<?php

use App\Http\Controllers\FiscaliasController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\GradosController;
use App\Http\Controllers\TipoParentescoController;
use App\Http\Controllers\TParentescoController;
use App\Http\Controllers\ConyugueController;
use App\Http\Controllers\ConsaguinidadController;
use App\Http\Controllers\AfinidadController;
use App\Http\Controllers\UnidadCargoController;
use App\Http\Controllers\AdopcionController;
use App\Http\Controllers\MpSiNoController;
// use App\Http\Controllers\TUsuarioController;
use App\Http\Controllers\MotivoDeclaracionesController;
use App\Http\Controllers\ParientesMpController;
use App\Http\Controllers\CausalIncompatibilidadController;
use App\Http\Controllers\TipoCausalesIncompatibilidadController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\VerificadoController;
use App\Http\Controllers\TUsersController;
use App\Http\Controllers\RestablecerPassword;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'loginView'] )->middleware('guest');
// agregamos 2 rutas, 1 para lecturar archivo, y otro para notificar de la aprovacion,
//  cada ruta con su respectiva funcion en el controller
Route::get('/ver/documento/aprobado/{archivo}',[VerificadoController::class, 'verDocumentoAprobado'])->name('verDocumentoAprobado');
Route::get('/login', [LoginController::class, 'loginView'] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'] )->name('authenticate')->middleware('guest');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/registrarme', function () {
   return view('auth.register');
})->name('register')->middleware('guest');
Route::post('/registrarme', [RegisterController::class, 'registro'])->name('registrarme')->middleware('guest');

Route::get('/restablecer-password', [RestablecerPassword::class, 'index'] );
Route::post('/restablecer-password', [RestablecerPassword::class, 'restablecer'])->name('restablecer');
Route::get('/cambiar-password', [RestablecerPassword::class, 'create']);
Route::post('/cambiar-password', [RestablecerPassword::class, 'store'])->name('cambiar-password');

Route::middleware(['web', 'auth'])->group( function() {
   Route::get('/inicio', function () {
      return view('home');
   });
   // registar usuarios / administradores
   Route::resource('usuarios', TUsersController::class);

   ///ruta de funcionario
   Route::resource('funcionario',FuncionarioController::class);
   
   Route::get('funcionario-pdf', [FuncionarioController::class, 'createPDF']);
   
   ////ruta de grado de parentesco
   Route::resource('grado_parentesco',GradosController::class);
   
   ////ruta tipo parentesco
   Route::resource('tipo_parentesco',TipoParentescoController::class);
   
   //ruta de parentesco
   Route::resource('parentesco',TParentescoController::class);
   
   //ruta de fiscalias
   Route::resource('fiscalias',FiscaliasController::class);
   
   //ruta de conyugue
   Route::resource('conyugue',ConyugueController::class);
   
   //ruta de consaguinidad
   Route::resource('consaguinidad',ConsaguinidadController::class);
   
   //ruta de afiidad
   Route::resource('afinidad',AfinidadController::class);
   //Auth::routes();
   
   //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   
   ///ruta para unidad_Cargo
   Route::resource('unidad_cargo',UnidadCargoController::class);
   ///ruta de usuario
   // Route::resource('usuario',TUsuarioController::class);

   //ruta de adopcion
   Route::resource('adopcion',AdopcionController::class);
   
   //si_no
   Route::resource('si_no',MpSiNoController::class);
   
   //motivo de declaracion
   Route::resource('motivo_declaracion',MotivoDeclaracionesController::class);
   //parientes_mp
   Route::resource('parientes_mp',ParientesMpController::class);
   //causal de incomatibilidad
   Route::resource('causal',CausalIncompatibilidadController::class);
   //Tipos causal de incomatibilidad
   Route::resource('tipos_causal_incompatibilidad', TipoCausalesIncompatibilidadController::class);
   
   /// denuncias de incompatibilidades
   Route::resource('denuncia',DenunciaController::class);
///// ruta de verificacion de documento
   Route::resource('subir_declaracion',VerificadoController::class);

});


// Auth::routes();
