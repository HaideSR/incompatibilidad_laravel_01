@extends('home')

@section('contenido')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Actualizacion de datos</title>
</head>
<body>
    <a href="{{ route('motivo_declaracion.index') }}">listado de Motivos</a>
    <h2>Editar Motivo Declaracion</h2>
    <form action="{{ route('motivo_declaracion.update', $motivodeclaraciones->id) }}" method ="POST">
        @csrf
        {{ method_field('PUT') }}
        <label>Motivo Declaracion:</label>
        <input type="text" name="motivo" placeholder="motivo" value="{{ $motivodeclaraciones->motivo }}">
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
@stop