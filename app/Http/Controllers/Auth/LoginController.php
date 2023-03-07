<?php

namespace App\Http\Controllers\Auth;
use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   use AuthenticatesUsers;

   /**
    * Where to redirect users after login.
    *
    * @var string
    */
   protected $redirectTo = RouteServiceProvider::HOME;

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {

      $this->middleware('guest')->except('logout');
   }
   public function loginView(Request $request)
   {
      if ($request->has('agetic')) {
         $agetic = urldecode($request->agetic);
         $agetic = (object) json_decode($agetic, true);
         // si C.D. devuelve error false, entonces continuamos
         // una cosa wilber hice la prueb aocn mi cudadania dicigtal, y me devuelve a mi login
         // dd('ingreso');
         if (!$agetic->error) {

            $ciudadanoDigital = (object) $agetic->response['ciudadanoDigital'];
            $documento_identidad = (object) $agetic->response['ciudadanoDigital']['documento_identidad'];
            $binnacleId = $agetic->response['binnacleId'];


            // en la tabla funcionario buscamos con este ci, 12415434 con este ci
            // si, explicqme mejor no nentiedno
            // ok ok

            // C.D te devuelve un email y un c.i.
            // con las q te registrsate en agetic

            // la siguiente linea lo q hace es, con ese c.i  q me devuelve agetic, busco un funcionrio en tu db
            // para ver si existe o no....
            // si existe funcionario con ese ci. entonces continua, caso contrario vuelve a login

            $funcionario = Funcionario::where('numero_ci', $documento_identidad->numero_documento)->with('user')->first();

            // no cumple esta condicion
            // dd($funcionario);
            // funcionario retorna null

            // ahora en caso de que existe, este funcionario debe estar relacionado con un usuario, por eso el 'if'

            if ($funcionario && $funcionario->user) {
               $request->session()->regenerate();
               $user = $funcionario->user;
               Auth::login($user);
               $isAdmin = $user->nivel == 'ADMIN' ? true : false;
               $isFuncionario = $user->nivel == 'FUNCIONARIO' ? true : false;

               Session::put('id', $user->id);
               Session::put('isAdmin', $isAdmin);
               Session::put('isFuncionario', $isFuncionario);
               Session::put('email', $user->email);
               Session::put('nivel', $user->nivel);
               Session::put('confirmado', $user->confirmado);
               if ($funcionario) {
                  Session::put('nombre', $funcionario->nombres);
                  Session::put('id_funcionario', $funcionario->id);
               }
               Session::put('binnacleId', $binnacleId);
               // ya tenemos el binnacleId en una session iniciada
               return redirect('/inicio');
            } else {
               $existeUsuario = User::where('email', $ciudadanoDigital->email)->first();
               $names = (object) $ciudadanoDigital->nombre;
               if($existeUsuario){
                  $newUser = $existeUsuario;
               }else{
               // registramos un user y su funcioanrio con los datos q agetic devuelva, siempre y cuando no exista
                  $newUser = new User();
                  $newUser->email = $ciudadanoDigital->email;
                  $newUser->nombre  = $names->nombres . " " . $names->primer_apellido . " " . $names->segundo_apellido;
                  $newUser->password = '123456789';
                  $newUser->nivel = 'FUNCIONARIO';
                  $newUser->estado = 1;
                  $newUser->confirmado = 1;
                  $newUser->save();
               }
               // se entiende??
               // vamos a autoregistrar para aquellos que no existen
               //ok, luego con eso ya piodemos hacer lo de la aprobacion?
               // si
               $newFuncionario = new Funcionario();
               $newFuncionario->numero_ci = $documento_identidad->numero_documento;
               $newFuncionario->complemento = null;
               $newFuncionario->expedido = null;
               $newFuncionario->apellido_paterno = $names->primer_apellido;
               $newFuncionario->apellido_materno = $names->segundo_apellido;
               $newFuncionario->nombres = $names->nombres;
               $nuevaFecha = date("Y-m-d", strtotime($ciudadanoDigital->fecha_nacimiento));
               $newFuncionario->fecha_nacimiento = $nuevaFecha;
               $newFuncionario->direccion = null;
               $newFuncionario->celular = $ciudadanoDigital->celular;
               //  $newFuncionario->fiscalia_otro = 'esto que es ???' haide??
                $newFuncionario->fecha_registro = now();;
               //  $newFuncionario->unidad = null;
               $newFuncionario->id_usuario = $newUser->id;
               $newFuncionario->save();
               /// gracias me puse llorar unn ratito, esque el ing vehia mis base de datos le dije que me corrija si esta mal mi logica
// y me permitio asi crearlo dijo que estaba perfecto
// jejejejejej ya ni moldes..


               //  $newFuncionario->fecha_registro'
               // cuando no pilla vuelve a login
               // se entiende? si ebntiendo pero dejamelo lo que me escribiste ya
               //para hacer la prueba podria eliminar a los usuarios y partir de ahi, que dices?,
               // como gustes
               // ese correo es el real de ciudadania digital que tengor egistrado

               // en este punto cuando no exite un funcionario tendriar que autoregistrar los datos q te devuelve agetic

               // luego lo haces psss
               // ske debia de existe un ci. en la tab
               // pero puedo crear numero de ci de todos modos ahorita,
               //  y en tu formualario de regsitro tambien tienes q pedir un ci.
               // asi ya tendriamos un c.i en un funcionario y yano necesitarioamos la tabla funcionario.
               // nobe?//mmm
               // mmmmm x2
               // le aumentamos ??// todo por hacerkle caso al ing, dijo que seria de la mejor manera
               // siento que bnio voy a terminar,
               // no esta complicado, segun yo..

               // ske con c.d solo se puede iniciar session con c.i.
               // ahi no hay correo, si
               /// pero me asuata cuabndo dices que no exisitiria la tabla funcionario, porque todas las emas tablas relacionadas
               //con funcionario, lo hagamos ahorita mejor.
               // le añadiremos un c.i. a tu tabla users

               // decidete mujer...!!, es un si o un despues ??

               // pero mejor lo haces despues
               // dale ??

               // terminaresmo de lo aprovacion
               //mañana debo mostrar a la licenciada mayra padilla que si funciona como te digo, sino no va a quwerer hacerme mi carta
               // hagmos solo lo q debemos, loguearse y
               // return view('auth.login');
               $request->session()->regenerate();
               $user = $newUser;
               Auth::login($user);
               $isAdmin = $user->nivel == 'ADMIN' ? true : false;
               $isFuncionario = $user->nivel == 'FUNCIONARIO' ? true : false;

               Session::put('id', $user->id);
               Session::put('isAdmin', $isAdmin);
               Session::put('isFuncionario', $isFuncionario);
               Session::put('email', $user->email);
               Session::put('nivel', $user->nivel);
               Session::put('confirmado', $user->confirmado);
               if ($newFuncionario) {
                  Session::put('nombre', $newFuncionario->nombres);
                  Session::put('id_funcionario', $newFuncionario->id);
               }
               Session::put('binnacleId', $binnacleId);
               // ya tenemos el binnacleId en una session iniciada
               return redirect('/inicio');
            }
         } else {
            return back()->withErrors(['invalid' => 'Inicio de sesión con C.D. no válida']);
         }
      }

      return view('auth.login');
   }

   public function authenticate(Request $request)
   {

      $request->validate([
         'email' => 'required|email',
      ]);

      $email = $request->email;
      $password = $request->password;
      if (Auth::attempt(['email'=> $email, 'password' => $password])) {
         $request->session()->regenerate();
         $user = Auth::User();
         $isAdmin = $user->nivel == 'ADMIN' ? true : false;
         $isFuncionario = $user->nivel == 'FUNCIONARIO' ? true : false;

         Session::put('id', $user->id);
         Session::put('isAdmin', $isAdmin);
         Session::put('isFuncionario', $isFuncionario);
         Session::put('email', $user->email);
         Session::put('nivel', $user->nivel);
         Session::put('confirmado', $user->confirmado);

         $funcionario = Funcionario::select()->where('id_usuario', '=', $user->id)->first();
         // $funcionario = Funcionario::where('id_usuario', $user->id)->firstOrFail();
         if($funcionario){
            Session::put('nombre', $funcionario->nombres);
            Session::put('id_funcionario', $funcionario->id);
         }

         return redirect('/inicio');
      }else{
         return back()->withErrors(['invalid' => 'Las credenciales no son válidas']);
      }
    }
    public function logout(){
         Auth::logout();
         Session::flush();
         session_unset();
         return redirect('/login');
    }
}
