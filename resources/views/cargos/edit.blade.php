@extends('home')

@section('contenido')
   <a href="{{ URL::previous() }}"> Volver</a>
   <div class="card max-800">
      <div class="card-body">
         <h4 class="text-center title-frm">Editar Fiscalia</h4>
         <form action="{{ route('cargos.update', $cargo->id) }}" method="POST" enctype="multipart/form-data"
            class="row g-3 form-register">
            @csrf
            {{ method_field('PUT') }}
            <div class="col-md-4">
               <label for="f1" clas="form-label">Nombre del cargo</label>
               <input type="text" name="nombre" class="form-control" value="{{ $cargo->nombre }}" id="f1"
                  required>
            </div>
            <div class="d-flex justify-content-around bx--btns">
               <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
               <button class="btn btn-primary" type="submit">Guardar </button>
            </div>
         </form>
      </div>
   </div>
@stop
