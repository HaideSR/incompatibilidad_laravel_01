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
                     <input name="email" type="text" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <input name="password" type="Password" class="form-control" placeholder="Contraseña">
                  </div>
                  <div class="mb text-end">
                     <a href="#!" class="forgot-password">¿Olvido su contraseña?</a>
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
                  <div class="form-group">
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
@endsection