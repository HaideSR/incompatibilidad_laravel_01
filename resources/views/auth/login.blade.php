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
            <h3 class="header-title">Inicia Sesión</h3>
            <form class="login-form">
               <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email">
               </div>
               <div class="form-group">
                  <input type="Password" class="form-control" placeholder="Contraseña">
               </div>
               <div class="mb text-end">
                  <a href="#!" class="forgot-password">¿Olvido su contraseña?</a>
               </div>
               <div class="form-group">
                  <button class="btn btn-primary btn-block">INGRESAR</button>
               </div>
               <div class="form-group">
                  <div class="text-center">¿No tienes cuenta? <a href="/registrarme">Registrate</a></div>
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

   {{-- <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">{{ __('Login') }}</div>

               <div class="card-body">
                  <form method="POST" action="{{ route('login') }}">
                     @csrf

                     <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                              name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                           @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>

                     <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                           <input id="password" type="password"
                              class="form-control @error('password') is-invalid @enderror" name="password" required
                              autocomplete="current-password">

                           @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>
                     </div>

                     <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                 {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                 {{ __('Remember Me') }}
                              </label>
                           </div>
                        </div>
                     </div>

                     <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                           <button type="submit" class="btn btn-primary">
                              {{ __('Login') }}
                           </button>

                           @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                 {{ __('Forgot Your Password?') }}
                              </a>
                           @endif
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div> --}}