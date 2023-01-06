@extends('home')

@section('contenido')
<form action="{{'/usuario'}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="cedula_identidad">Cedula de Identidad</label>
    <input type="text" name='cedula_identidad'>
    <br>
    <label for="compplemento">Complemento</label>
    <input type="text" name='complemento'>
    <br>
    <label for="expedido">Expedido</label>
    <input type="text" name='expedido'>
    <br>
    <label for="apellido_paterno">Nombres</label>
    <input type="text" name='apellido_paterno'>
    <br>
    <label for="apellido_materno">Apellido Paterno</label>
    <input type="text" name='apellido_materno'>
    <br>
    <label for="nombres">Apellido Materno</label>
    <input type="text" name='nombres'>
    <br>
    <label for="nivel">Nivel</label>
    <input type="text" name='nivel'>
    <br>
    <label for="activado">Activado</label>
    <input type="text" name='activado'>
    <br>
    <label for="perfil">Perfil</label>
    <input type="text" name='perfil'>
    <br>
    <label for="usuario">Usuario</label>
    <input type="text" name='usuario'>
    <br>
    <label for="email">Email</label>
    <input type="text" name='email'>
    <br>
    <label for="clave">Clave</label>
    <input type="text" name='clave'>
    <br>

    <p><button type="submit">Crear</button></p>
    <br>
  
</form>
@stop