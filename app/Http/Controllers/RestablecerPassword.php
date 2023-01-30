<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\SendEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Mail;
use DateTime;

class RestablecerPassword extends Controller{
   public function index(){
      return view('auth.restablecer-password.index');
   }
   public function restablecer(Request $request){
      $request->validate([
         'email' => 'required|email',
      ]);
      $email = $request->email;
      $user = User::firstWhere('email', $email);
      $token = Str::random(60);
       
      if($user){
         $mailData = [
            'emailUser' => $email,
            'subject' => 'Cambiar de contraseña',
            'type' => 'reset',
            'title' => 'Restablecer contraseña',
            'token' => $token
         ];
         DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()
         ]);
         try {
            Mail::to($email)->send(new SendEmails($mailData));
            return back()->withErrors(['enviado' => 'Revisa tu correo electrónico y Siga el enlace para restablecer su contraseña.']);
         } catch (\Throwable $th) {
            return back()->withErrors(['invalid' => 'Error al enviar, vuelve a intentarlo']);
         }
      }else{
         return back()->withErrors(['enviado' => 'Revisa tu correo electrónico y Siga el enlace para restablecer su contraseña']);
      }
   }

   public function create(){
      return view('auth.restablecer-password.create');
   }

   public function store(Request $request){
      $pass1 = $request->password;
      $pass2 = $request->password2;
      $token = $request->token;
      $email = $request->email;

      $request->validate([
         'password' => 'required|string|min:6',
      ]);
      
      if($pass1 != $pass2){
         return back()->withErrors(['invalid' => 'Las contraseñas no coinciden']);
      }
      $reset = DB::table('password_resets')->where('token', $token)->first();
      //validar el tiempo menor a 1 dia
      if($reset && $this->validarTiempo($reset->created_at)){
         if($email == $reset->email){
            $user = User::firstWhere('email', $email);
            $user->password = Hash::make($pass1);
            $user->update();
            DB::table('password_resets')->where('token', $token)->delete();
            return back()->withErrors(['enviado' => 'Contraseña, cambiada exitosamente. Inicie sesión']);
         }else{
            return back()->withErrors(['invalid' => 'Email no válido']);
         }
      }else{
         return back()->withErrors(['invalid' => 'Código de verificación no válido vuelva a solicitar el cambio de contraseña']);
      }
      return back()->withErrors(['invalid' => 'Error']);
   }

   private function validarTiempo($created_at) {
      $now = now();
      $now = new DateTime($now); 
      $created_at = new DateTime($created_at); 
      $interval = $now->diff($created_at);
      $days = $interval->format('%a');
      if($days == 0){
         return true;
      }
      return false;
   }

}
