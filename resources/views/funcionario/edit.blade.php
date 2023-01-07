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
            <input type="text" name="expedido" class="form-control" value="{{ $funcionario->expedido }}" id="f3">
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
         <div class="col-md-8">
            <label for="f8" class="form-label">Dirección</label>
            <input type="text" name='direccion' class="form-control" value="{{ $funcionario->direccion }}" id="f8">
         </div> 
         <div class="col-md-4">
            <label for="f9" class="form-label">Celular</label>
            <input type="text" name='celular' class="form-control" value="{{ $funcionario->celular }}" id="f9">
         </div>
         <div class="col-md-6">
            <label for="f9" class="form-label">Funcionario de la fiscalida de </label>
            <input type="text" name='fiscalia_otro' class="form-control" value="{{ $funcionario->fiscalia_otro }}" id="f9">
         </div> 
         <div class="col-md-6">
            <label for="f9" class="form-label">Unidad</label>
            <input type="text" name='unidad' class="form-control" value="{{ $funcionario->unidad }}" id="f9">
         </div>
                
         <div class="d-flex justify-content-around bx--btns">
            <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
         </div> 
      </form>
   </div>
</div>
@stop
