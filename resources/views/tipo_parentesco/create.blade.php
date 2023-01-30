
@extends('home')

@section('contenido')
<div class="card max-800">
  <div class="card-body">
     <h4 class="text-center title-frm">Agregar Tipo Parentesco</h4>
     <form action="{{'/tipo_parentesco'}}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
        @csrf
        <div class="col-md-4">
        <label for="f1" class="form-label">Tipo de Parentesco:</label>
        <input type="text" name='tipo_parentesco' class="form-control" id="f1">
        </div>
        <div class="d-flex justify-content-around bx--btns">
          <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
          <button class="btn btn-primary" type="submit">Registrar </button>
       </div> 
</form>
@stop