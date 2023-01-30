@extends('home')

@section('contenido')
<a href="{{ URL::previous() }}"> Volver</a>
<div class="card max-800">
   <div class="card-body">
    <h4 class="text-center title-frm">Editar Tipo Parentesco</h4>
    <form action="{{ route('tipo_parentesco.update', $tipo_parentescos->id) }}" method ="POST" enctype="multipart/form-data" class="row g-3 form-register">
        @csrf
        {{ method_field('PUT') }}
        <div class="col-md-4">
        <label for="f1" class="form-label">Tipo Parentesco</label>
        <input type="text" name="tipo_parentesco" class="form-control" value="{{ $tipo_parentescos->tipo_parentesco }}" id="f1" required>
        </div>
        <div class="d-flex justify-content-around bx--btns">
            <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
        </div> 
    </form>

@stop