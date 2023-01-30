@extends('index')
@section('contenido')
   <div class="login-box box-log-home"> 
      <div class="box-log-grid">
         <div>
            <div class="mb">
               <p class="logo-text-in">Restablecer contraseña</p>
            </div>
            <div class="">
               <form action="{{ route('restablecer') }}" method="POST" class="login-form" enctype="multipart/form-data">
                  @csrf
                  <p class="mb">Ingrese su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña.</p>
                  <div class="form-group">
                     <input name="email" type="text" class="form-control" placeholder="Email" required>
                  </div>
                  @error('enviado')
                     <span class="valid-feedback block mb" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
                  @error('email')
                     <span class="invalid-feedback block mb" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
                  @error('invalid')
                     <span class="invalid-feedback block mb" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
                  <div class="form-group">
                     <button class="btn btn-primary btn-block">Restablecer contraseña</button>
                  </div>
                  <div class="mb text-center mt">
                     <a href="/" class="forgot-password">Inicia Sesión</a>
                  </div>
               </form>
            </div>
         </div>
         <div class="">
            <div class="slider-feature-card">
               <img src="../img/logo-oficial.png" alt="">
               <p class="slider-description">Construyendo juntos un sistema penal más justo, pero fundamentalmente más humano.</p>
            </div>
         </div>
      </div>
   </div>
@endsection