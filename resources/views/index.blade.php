<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>SISTEMA INCOMPATIBILIDADES</title>
   
   <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ URL::asset('icons/style.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/app.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/menu.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/forms.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/login.css') }} ">
   <script src="{{ URL::asset('js/bootstrap.min.js') }}" defer></script>
</head>

<body>
   <section class="body">
      <div class="container">
         @yield('contenido')
      </div>
   </section>
</body>
</html>
