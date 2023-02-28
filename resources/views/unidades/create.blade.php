@extends('home')

@section('contenido')
<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Agregar Unidad</h4>
      <form action="{{'/unidades'}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="col-md-12">
            <label for="f1" clas="form-label">Nombre da la unidad</label>
            <input type="text" name='nombre' class="form-control" id="f1" required>
         </div>
      
         <div class="d-flex justify-content-around bx--btns">
            <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
         </div>
      </form>
   </div>
</div>
@stop