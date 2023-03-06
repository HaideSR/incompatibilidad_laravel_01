@extends('home')

@section('contenido')
<a href="{{ route('motivo_declaracion.index') }}">listado de Motivos</a>
   <div class="card max-800">
      <div class="card-body">
         <h4 class="text-center title-frm">Editar Motivo Declaración</h4>
         <form action="{{ route('motivo_declaracion.update', $motivodeclaraciones->id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="col-md-12">
               <label for="f1" class="form-label">Motivo</label>
               <input type="text" name='motivo' class="form-control" id="f1" value="{{ $motivodeclaraciones->motivo }}">
            </div>
            <div class="d-flex justify-content-around bx--btns">
               <a href="/motivo_declaracion" class="btn btn-light">Cancelar</a>
               <button class="btn btn-primary" type="submit">Guardar cambios</button>
            </div>
         </form>
      </div>
   </div>
@stop
