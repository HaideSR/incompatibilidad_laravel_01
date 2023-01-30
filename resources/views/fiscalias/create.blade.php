@extends('home')

@section('contenido')
<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Agregar Fiscalia</h4>
<form action="{{'/fiscalias'}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-4">
    <label for="f1" clas="form-label">Departamento:</label>
    <input type="text" name='departamento' class="form-control" id="f1" required>
    </div>
   
    <div class="col-md-4">
    <label for="f2" clas="form-label">Denominacion:</label>
    <input type="text" name='denominacion' class="form-control" id="f2" required>
    </div>
    
    <div class="d-flex justify-content-around bx--btns">
        <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
        <button class="btn btn-primary" type="submit">Registrar </button>
     </div> 
  
</form>
@stop