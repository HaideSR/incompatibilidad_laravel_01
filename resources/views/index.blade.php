<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Laravel</title>
   
   <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/icons/style.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/app.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/menu.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/forms.css') }} ">
   <link rel="stylesheet" href="{{ URL::asset('css/login.css') }} ">
   <script src="{{ URL::asset('js/bootstrap.min.js') }}" defer></script>
   <script src="{{ URL::asset('js/steps.js') }}" defer></script>
</head>

<body>
   <section class="body">
      <div class="container">
         @yield('contenido')
      </div>
   </section>
</body>
</html>
