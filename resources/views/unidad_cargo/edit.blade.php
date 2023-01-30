@extends('home')
@section('contenido')

<a href="{{ URL::previous() }}"> Volver</a>
<div class="card max-800">
   <div class="card-body">
    <h4 class="text-center title-frm">Editar Unidad/Cargo</h4>
      <form action="{{ route('unidad_cargo.update', $unidad_cargo->id) }}" method="POST" enctype="multipart/form-data" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}

         <div class="col-md-4">
               <label for="f1" class="form-label">Unidad</label>
               <input type="text" name="unidad" class="form-control" value="{{ $unidad_cargo->unidad }}" id="f1" required>
            
         </div>
         <div class="col-md-4">
            <label for="f2" class="form-label">Cargo</label>
            <input type="text" name="cargo" class="form-control" value="{{ $unidad_cargo->cargo }}" id="f2" required>
         
      </div>
         <div class="col-md-4">
            <label for="f3" class="form-label">Fiscalia/otro</label>
            <select name="id_fiscalia" class="form-control" id="f3" required>
                   @foreach($fiscalias as $fiscalia)
                   <option value="{{$fiscalia['id']}}"  @selected( $fiscalia['id']== $unidad_cargo['id_fiscalia'])>{{$fiscalia['denominacion']}}</option>
                   @endforeach
            </select>
            </div>
           

               <div class="d-flex justify-content-around bx--btns">
                  <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
                  <button class="btn btn-primary" type="submit">Registrar </button>
               </div> 
      </form>
   </div>
</div>
@stop
