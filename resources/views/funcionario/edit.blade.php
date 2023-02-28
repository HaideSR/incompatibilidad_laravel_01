@extends('home')

@section('contenido')
<a href="{{ URL::previous() }}"> Volver</a>
<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Editar funcionario</h4>
      <form action="{{ route('funcionario.update', $funcionario->id) }}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}
         <div class="col-md-4">
            <label for="f1" class="form-label">Cédula Identidad</label>
            <input type="text" name="numero_ci" class="form-control" value="{{ $funcionario->numero_ci }}" id="f1" required>
         </div>
         <div class="col-md-4">
            <label for="f2" class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control" value="{{ $funcionario->complemento }}" id="f2">
         </div>
         <div class="col-md-4">
            <label for="f3" class="form-label">Expedido</label>
            <select name="expedido" class="form-control" value="{{ $funcionario->expedido }}" id="f3">
               <option value="">--Seleccionar--</option>
               <option @selected( $funcionario->expedido == 'TJ') value="TJ">Tarija</option>
               <option @selected( $funcionario->expedido == 'PT') value="PT">Potosi</option>
               <option @selected( $funcionario->expedido == 'SC') value="SC">Santa Cruz</option>
               <option @selected( $funcionario->expedido == 'OR') value="OR">Oruro</option>
               <option @selected( $funcionario->expedido == 'BE') value="BE">Beni</option>
               <option @selected( $funcionario->expedido == 'PD') value="PD">Pando</option>
               <option @selected( $funcionario->expedido == 'LP') value="LP">La Paz</option>
               <option @selected( $funcionario->expedido == 'CH') value="CH">Chuquisaca</option>
               <option @selected( $funcionario->expedido == 'CB') value="CB">Cochabamba</option>
            </select>
         </div>
         <div class="col-md-6">
            <label for="f4" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" value="{{ $funcionario->apellido_paterno }}" id="f4">
         </div>
         <div class="col-md-6">
            <label for="f5" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" class="form-control" value="{{ $funcionario->apellido_materno }}" id="f5" required>
         </div>
         <div class="col-md-8">
            <label for="f6" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="f6" value="{{ $funcionario->nombres }}" required>
         </div> 
         <div class="col-md-4">
            <label for="f7" class="form-label">Fecha de nacimiento</label>
            <input type="date" name='fecha_nacimiento' class="form-control" value="{{ $funcionario->fecha_nacimiento }}" id="f7">
         </div>
         <div class="col-md-3">
            <label for="f8_" class="form-label">Estado civil</label>
            <select name="estado_civil" class="form-control" id="f8_">
               <option value="">---Seleccionar---</option>
               <option @selected( $funcionario->estado_civil == 'Soltero(a)') value="Soltero(a)">Soltero(a)</option>
               <option @selected( $funcionario->estado_civil == 'Casado(a)') value="Casado(a)">Casado(a)</option>
               <option @selected( $funcionario->estado_civil == 'Viudo(a)') value="Viudo(a)">Viudo(a)</option>
               <option @selected( $funcionario->estado_civil == 'Divorciado(a)') value="Divorciado(a)">Divorciado(a)</option>
               <option @selected( $funcionario->estado_civil == 'Conviviente') value="Conviviente">Conviviente</option>
            </select>
         </div>
         <div class="col-md-6">
            <label for="f8" class="form-label">Dirección</label>
            <input type="text" name='direccion' class="form-control" value="{{ $funcionario->direccion }}" id="f8">
         </div> 
         <div class="col-md-3">
            <label for="f9" class="form-label">Celular</label>
            <input type="text" name='celular' class="form-control" value="{{ $funcionario->celular }}" id="f9">
         </div>
         <div class="col-md-4">
            <label for="f9" class="form-label">Funcionario de la fiscalida de </label>
            <select name="id_fiscalia" id="inputFiscalia_id" class="form-control" id="f3" >
               <option value="">--Selecciona fiscalia--</option>
               @foreach($fiscalias as $fiscalia)
               <option value="{{$fiscalia['id']}}" @selected( $fiscalia['id']== $funcionario['id_fiscalia']) >{{$fiscalia['denominacion']}}</option>
               @endforeach
           </select>
         </div> 
         <div class="col-md-4">
            <label for="f9" class="form-label">Unidad</label>
            <select name="id_unidad" id="inputFiscalia_id" class="form-control" id="f3" >
               <option value="">--Selecciona unidad--</option>
               @foreach($unidades as $unidad)
               <option value="{{$unidad['id']}}" @selected( $unidad['id'] == $funcionario['id_unidad'])>{{$unidad['nombre']}}</option>
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
