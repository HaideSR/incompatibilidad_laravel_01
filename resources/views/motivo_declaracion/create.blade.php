@extends('home')

@section('contenido')
<h1>Motivo de Declaracion</h1>
<form action="{{'/motivo_declaracion'}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="motivo">Motivo:</label>
    <input type="text" name='motivo'>
    <br>
    <p><button type="submit">Registrar Motivo</button></p>
      <br>
</form>
@stop