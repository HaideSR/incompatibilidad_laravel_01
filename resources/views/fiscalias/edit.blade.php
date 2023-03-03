@extends('home')

@section('contenido')
   <a href="{{ URL::previous() }}"> Volver</a>
   <div class="card max-800">
      <div class="card-body">
         {{-- }} <a href="{{ route('fiscalias.index') }}"> Ver listado de Fiscalias</a> --}}
         <h4 class="text-center title-frm">Editar Fiscalia</h4>
         <form action="{{ route('fiscalias.update', $t_fiscalias->id) }}" method="POST" enctype="multipart/form-data"
            class="row g-3 form-register">
            @csrf
            {{ method_field('PUT') }}

            <div class="col-md-6">
               <label for="f1" class="form-label">Departamento:</label>
               <input type="text" name="departamento" class="form-control" value="{{ $t_fiscalias->departamento }}"
                  id="f1" required>
            </div>
            <div class="col-md-6">
               <label for="f1" class="form-label">Denominacion:</label>
               <input type="text" name="denominacion" class="form-control" value="{{ $t_fiscalias->denominacion }}"
                  id="f2" required>
            </div>
            <div class="d-flex justify-content-around bx--btns">
               <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
               <button class="btn btn-primary" type="submit">Registrar </button>
            </div>
         </form>
      </div>
   </div>
@stop
