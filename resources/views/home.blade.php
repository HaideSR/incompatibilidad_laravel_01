<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>SISTEMA INCOMPATIBILIDADES</title>

   <!-- Fonts -->
   <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ URL::asset('iconos/style.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/app.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/menu.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/forms.css') }} ">
   <script src="{{ URL::asset('js/popper.min.js') }}" defer></script>
   <script src="{{ URL::asset('js/bootstrap.min.js') }}" defer></script>
   <script src="{{ URL::asset('js/steps.js') }}" defer></script>
</head>

<body>
   {{-- <div>
      @if (Route::has('login'))
         <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
               <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
               <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

               @if (Route::has('register'))
                  <a href="{{ route('register') }}"
                     class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
               @endif
            @endauth
         </div>
      @endif
   </div> --}}
   <div class="layout has-sidebar fixed-sidebar fixed-header main-content">
      @include('_componentes.menu')
      <div class="view-content">
         @include('_componentes.header')
         <main class="content">
            <div>
               @yield('contenido')
            </div>
            <footer class="footer"></footer>
         </main>
         <div class="overlay"></div>
      </div>
      <div id="mask" class="mask-sidebar"></div>
   </div>
</body>
<script>
   const sidebar = document.getElementById('sidebar')
   const mask = document.getElementById('mask') 
   mask.addEventListener('click', e => {
      sidebar.classList.remove('min-sidebar')
   })
   // sidebar.addEventListener('click', e => {
   //    console.log(e);
   // })
</script>
</html>
