@extends('home')
@section('contenido')
   <div class="card max-800">
      <div class="card-body">
         <h4 class="text-center title-frm">Agregar funcionario</h4>
         <form action="{{ '/funcionario' }}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
            @csrf
            <input type="hidden" name='id_usuario'>
            <div class="col-md-4">
               <label for="f1" class="form-label">Cédula Identidad</label>
               <input type="text" name="numero_ci" class="form-control" id="f1" required>
            </div>
            <div class="col-md-4">
               <label for="f2" class="form-label">Complemento</label>
               <input type="text" name="complemento" class="form-control" id="f2">
            </div>
            <div class="col-md-4">
               <label for="f3" class="form-label">Expedido</label>
               <select name="expedido" class="form-control" id="f3">
                  <option value="">---Seleccionar---</option>
                  <option value="TJ">Tarija</option>
                  <option value="PT">Potosi</option>
                  <option value="SC">Santa Cruz</option>
                  <option value="OR">Oruro</option>
                  <option value="BE">Beni</option>
                  <option value="PD">Pando</option>
                  <option value="LP">La Paz</option>
                  <option value="CH">Chuquisaca</option>
                  <option value="CB">Cochabamba</option>
               </select>
            </div>
            <div class="col-md-6">
               <label for="f4" class="form-label">Apellido paterno</label>
               <input type="text" name="apellido_paterno" class="form-control" id="f4">
            </div>
            <div class="col-md-6">
               <label for="f5" class="form-label">Apellido materno</label>
               <input type="text" name="apellido_materno" class="form-control" id="f5" required>
            </div>
            <div class="col-md-8">
               <label for="f6" class="form-label">Nombres</label>
               <input type="text" name="nombres" class="form-control" id="f6" required>
            </div>
            <div class="col-md-4">
               <label for="f7" class="form-label">Fecha de nacimiento</label>
               <input type="date" name='fecha_nacimiento' class="form-control" id="f7">
            </div>
            <div class="col-md-3">
               <label for="f8_" class="form-label">Estado civil</label>
               <select name="estado_civil" class="form-control" id="f8_">
                  <option value="">---Seleccionar---</option>
                  <option value="Soltero(a)">Soltero(a)</option>
                  <option value="Casado(a)">Casado(a)</option>
                  <option value="Viudo(a)">Viudo(a)</option>
                  <option value="Divorciado(a)">Divorciado(a)</option>
                  <option value="Conviviente">Conviviente</option>
               </select>
            </div>
            <div class="col-md-6">
               <label for="f8" class="form-label">Dirección</label>
               <input type="text" name='direccion' class="form-control" id="f8">
            </div>
            <div class="col-md-3">
               <label for="f9" class="form-label">Celular</label>
               <input type="text" name='celular' class="form-control" id="f9">
            </div>
            <div class="col-md-4">
               <label for="f9" class="form-label">Funcionario de la fiscalida de </label>
               <select name="id_fiscalia" id="inputFiscalia_id" class="form-control" id="f3" >
                  <option value="">--Selecciona fiscalia--</option>
                  @foreach($fiscalias as $fiscalia)
                  <option value="{{$fiscalia['id']}}">{{$fiscalia['denominacion']}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-4">
               <label for="f9" class="form-label">Unidad</label>
               <select name="id_unidad" id="inputFiscalia_id" class="form-control" id="f3" >
                  <option value="">--Selecciona unidad--</option>
                  @foreach($unidades as $unidad)
                  <option value="{{$unidad['id']}}">{{$unidad['nombre']}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-4">
               <label for="f9" class="form-label">Cargo</label>
               <select name="id_cargo" id="inputFiscalia_id" class="form-control" id="f3" >
                  <option value="">--Selecciona cargo--</option>
                  @foreach($cargos as $cargo)
                  <option value="{{$cargo['id']}}">{{$cargo['nombre']}}</option>
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
