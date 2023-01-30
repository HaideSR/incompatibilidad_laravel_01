@extends('index')
@section('contenido')
   <div class="login-box box-log-home"> 
      <div class="box-log-grid">
         <div>
            <div class="mb">
               <p class="mb logo-text-in">Nueva contraseña</p>
            </div>
            <br>
            <div class="mt">
               <form action="{{ route('cambiar-password') }}" method="POST" class="mt login-form" enctype="multipart/form-data">
                  @csrf
                  <input name="email" type="hidden" value="{{request()->query('from')}}">
                  <input name="token" type="hidden" value="{{request()->query('token')}}">
                  <div class="form-group">
                     <label class="form-label">Ingresa nueva contraseña</label>
                     <input name="password" type="password" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label class="form-label">Repite nueva contraseña</label>
                     <input name="password2" type="password" class="form-control" required>
                  </div>
                  
                  @error('enviado')
                     <span class="valid-feedback block mb" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     <script>
                        setTimeout(() => {
                           window.location.replace('/')
                        }, 2500);
                     </script> 
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
                  <div class="form-group mb">
                     <button class="btn btn-primary btn-block">Guardar contraseña</button>
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