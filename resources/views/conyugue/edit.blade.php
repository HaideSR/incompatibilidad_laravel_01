@extends('home')

@section('contenido')
<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Editar Conyugue</h4>
      <form action="{{ route('conyugue.update', $t_conyugue->id) }}" method="POST" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}
         <div class="col-md-4">
            <label for="f1" class="form-label">Cédula Identidad</label>
            <input type="text" name="numero_ci" class="form-control" id="f1" value="{{ $t_conyugue->numero_ci }}" required>
         </div>
         <div class="col-md-4">
            <label for="f2" class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control" id="f2" value="{{ $t_conyugue->complemento }}">
         </div>
         <div class="col-md-4">
            <label for="f3" class="form-label">Expedido</label>
            {{-- <input type="text" name="expedido" class="form-control" id="f3" value="{{ $t_conyugue->expedido }}" required> --}}
            <select name="expedido" class="form-control" value="{{ $funcionario->expedido }}" id="f3">
               <option value="">--Seleccionar--</option>
               <option @selected( $t_conyugue->expedido == 'TJ') value="TJ">Tarija</option>
               <option @selected( $t_conyugue->expedido == 'PT') value="PT">Potosi</option>
               <option @selected( $t_conyugue->expedido == 'SC') value="SC">Santa Cruz</option>
               <option @selected( $t_conyugue->expedido == 'OR') value="OR">Oruro</option>
               <option @selected( $t_conyugue->expedido == 'BE') value="BE">Beni</option>
               <option @selected( $t_conyugue->expedido == 'PD') value="PD">Pando</option>
               <option @selected( $t_conyugue->expedido == 'LP') value="LP">La Paz</option>
               <option @selected( $t_conyugue->expedido == 'CH') value="CH">Chuquisaca</option>
               <option @selected( $t_conyugue->expedido == 'CB') value="CB">Cochabamba</option>
            </select>
         </div>
         <div class="col-md-4">
            <label for="f4" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" id="f4" value="{{ $t_conyugue->apellido_paterno }}">
         </div>
         <div class="col-md-4">
            <label for="f5" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" class="form-control" id="f5" value="{{ $t_conyugue->apellido_materno }}" required>
         </div>
         <div class="col-md-4">
            <label for="f6" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="f6" value="{{ $t_conyugue->nombres }}" required>
         </div>
         <div class="col-md-6">
            <label for="f7" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="f7" value="{{ $t_conyugue->direccion }}" required>
         </div> 
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{$t_conyugue->id_funcionario}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
         </div>
      </form>
   </div>
</div>
@stop