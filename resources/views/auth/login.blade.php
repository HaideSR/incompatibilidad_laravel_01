@extends('index')
@section('contenido')
   <div class="login-box box-log-home"> 
      <div class="box-log-grid">
         <div>
            <div class=" mb">
               <div class="logo">
                  <span class="logo-font">Sistema </span>de
               </div>
               <p class="logo-text-in">Incompatibilidades</p>
            </div>
            <div class="">
               <h3 class="header-title">Inicia Sesión</h3>
               <form action="{{ route('login') }}" method="POST" class="login-form" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                     <input name="email" type="text" class="form-control" placeholder="Email" required> 
                  </div>
                  <div class="form-group">
                     <div class="flex flex-center-ai">
                     <input name="password" type="password" class="form-control input-password" placeholder="Contraseña" id="password" required>
                     <i class="icon-remove_red_eye" id="eye"></i>
                     </div>
                     
                  </div>
                  <div class="mb text-end">
                     <a href="/restablecer-password" class="forgot-password">¿Olvido su contraseña?</a>
                  </div>
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
                     <button class="btn btn-primary btn-block">INGRESAR</button>
                  </div>
                  <div class="divider-login">
                     <span>o</span>
                  </div>
                  <div class="form-group mb">
                     <a class="btn btn-outline-warning btn-two-orange" href="https://orion.fiscalia.gob.bo/?urlRedirectLogin=http://declaracionjurada-mp.fiscalia.gob.bo">Ingresa con ciudadania digital</a>
                  </div>
                  
                  <div class="mt form-group">
                     <div class="text-center">¿No tienes cuenta? <a href="/registrarme">Registrate</a></div>
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
   
   <script>
    const password = document.getElementById('password')
    const eye = document.getElementById('eye')
    if(eye){
         eye.addEventListener('click', e => { 
          if(password.type == 'password'){
                password.type = 'text'
          }  else{
               password.type = 'password'
                  }
         }) 
      }

   </script>
@endsection