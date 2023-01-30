@extends('home')

@section('contenido')
<a href="{{ URL::previous() }}"> Volver</a>
<div class="card max-800">
   <div class="card-body">
    <h4 class="text-center title-frm">Editar Grado Parentesco</h4>
    <form action="{{ route('grado_parentesco.update', $t_grado->id) }}" method ="POST" enctype="multipart/form-data" class="row g-3 form-register">
        @csrf
        {{ method_field('PUT') }}
        <div class="col-md-4">
        <label for="f1" class="form-label">Grado:</label>
        <input type="text" name="grados" class="form-control" value="{{ $t_grado->grados }}">
        </div>
        <div class="d-flex justify-content-around bx--btns">
            <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
        </div> 
    </form>

@stop