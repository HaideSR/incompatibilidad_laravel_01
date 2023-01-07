@extends('index')
@section('contenido')
<div class="login-box">
   <div class="row">
      <div class="col-sm-6">
         <div class="logo">
            <span class="logo-font">Sistema </span>de
         </div>
         <p class="logo-text-in">Incompatibilidades</p>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-6">
         <br>
         <h3 class="header-title">Registrate</h3>
         <form action="{{ route('registrarme') }}" method="POST" class="login-form" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
               <input type="text" class="form-control" placeholder="Nombre">
            </div> --}}
            <div class="form-group">
               <input name="email" type="text" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
               <input name="password" type="Password" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
               <input name="password_confirmation" type="Password" class="form-control" placeholder="Repite contraseña">
            </div>
            @error('email')
               <span class="invalid-feedback block mb" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
            @enderror
            @error('password')
               <span class="invalid-feedback block mb" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
            @enderror
            @error('password_confirmation')
               <span class="invalid-feedback block mb" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
            @enderror
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block">Registrarme</button>
            </div>
            <div class="form-group">
               <div class="text-center">¿Ya tienes cuenta? <a href="/login">Iniciar sesión</a></div>
            </div>
         </form>
      </div>
      <div class="col-sm-6 hide-on-mobile">
         <div class="slider-feature-card">
            <img src="../img/logo-oficial.png" alt="">
            <p class="slider-description">Construyendo juntos un sistema penal más justo, pero fundamentalmente más humano.</p>
         </div>
      </div>
   </div>
</div>
@endsection
