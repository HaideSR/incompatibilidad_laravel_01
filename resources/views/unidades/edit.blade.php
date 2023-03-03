@extends('home')

@section('contenido')
   <a href="{{ URL::previous() }}"> Volver</a>
   <div class="card max-800">
      <div class="card-body">
         <h4 class="text-center title-frm">Editar Unidad</h4>
         <form action="{{ route('unidades.update', $unidad->id) }}" method="POST" enctype="multipart/form-data"
            class="row g-3 form-register">
            @csrf
            {{ method_field('PUT') }}
            <div class="col-md-12">
               <label for="f1" clas="form-label">Nombre de la unidad</label>
               <input type="text" name="nombre" class="form-control" value="{{ $unidad->nombre }}" id="f1"
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
