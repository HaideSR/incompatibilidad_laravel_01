<!DOCTYPE html>
<html lang="es">

<head>
   <title>Restablecer Contraseña </title>
</head>

<body>
   <h1>{{ $data['title'] }}</h1>
   <h3>Sistema de Incompatibilidades</h3>
   <div>
      <p>Para Cambiar tu contraseña ingresa al siguente enlace: </p>
      <a href="{{env('DOMINIO_PUBLICO')}}/cambiar-password?token={{$data['token']}}&from={{$data['emailUser']}}">➡️ Restablecer contraseña</a>
   </div>
</body>
</html>
