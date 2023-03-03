@extends('home')

@section('contenido')
   <div class="card max-800">
      <div class="card-body">
         <h4 class="text-center title-frm">Agregar Motivo Declaración</h4>
         <form action="{{ '/motivo_declaracion' }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
               <label for="f1" class="form-label">Motivo</label>
               <input type="text" name='motivo' class="form-control" id="f1">
            </div>
            <div class="d-flex justify-content-around bx--btns">
               <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
               <button class="btn btn-primary" type="submit">Registrar </button>
            </div>
         </form>
      </div>
   </div>
@stop