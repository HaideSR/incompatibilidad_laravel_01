@extends('home')
@section('contenido')

<a href="{{ URL::previous() }}"> Volver</a>
<div class="card max-800">
   <div class="card-body">
    <h4 class="text-center title-frm">Editar Parentesco</h4>
      <form action="{{ route('parentesco.update', $parentescos->id) }}" method="POST" enctype="multipart/form-data" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}

         <div class="col-md-4">
               <label for="f1" class="form-label">Parentesco</label>
               <input type="text" name="parentesco" class="form-control" value="{{ $parentescos->parentesco }}" id="f1" required>
            
         </div>
         <div class="col-md-4">
            <label for="f2" class="form-label">Tipo de Parentesco:</label>
            <select name="id_tipoParentesco" class="form-control" id="f2" required>
                   @foreach($tipo_parentescos as $tipo_parentesco)
                   <option value="{{$tipo_parentesco['id']}}"  @selected( $tipo_parentesco['id']== $parentescos['id_tipoParentesco'])>{{$tipo_parentesco['tipo_parentesco']}}</option>
                   @endforeach
            </select>
            </div>
            <div class="col-md-4">
               <label for="f3" class="form-label">Grado:</label>
               <select name="id_grado" class="form-control" id="f3" required>
                      @foreach($grados as $grado)
                      <option value="{{$grado['id']}}" @selected( $grado['id']== $parentescos['id_grado'])>{{$grado['grados']}}</option>
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
