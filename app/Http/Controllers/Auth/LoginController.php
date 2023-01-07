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
use Session;

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
    public function authenticate(Request $request){
      
      $request->validate([
         'email' => 'required|email',
      ]);

      $email = $request->email;
      $password = $request->password;
      if (Auth::attempt(['email'=> $email, 'password' => $password])) {
         $request->session()->regenerate();
         $user = Auth::User();
         $isAdmin = $user->nivel == 'ADMIN' ? true : false;
         Session::put('id', $user->id);
         Session::put('isAdmin', $isAdmin);
         Session::put('email', $user->email);
         Session::put('nivel', $user->nivel);
         Session::put('confirmado', $user->confirmado);

         $funcionario = Funcionario::select()->where('id_usuario', '=', $user->id)->first();
         // $funcionario = Funcionario::where('id_usuario', $user->id)->firstOrFail();
         if($funcionario){
            Session::put('nombre', $funcionario->nombres);
         }

         return redirect('/inicio');
      }else{
         return back()->withErrors(['invalid' => 'Las credenciales no son válidas']);
      }
    }
    public function logout(){
         Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
