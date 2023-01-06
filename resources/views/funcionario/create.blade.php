@extends('home')
@section('contenido')
<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Agregar funcionario</h4>
      <form action="{{'/funcionario'}}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
         @csrf
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
            <input type="text" name="expedido" class="form-control" id="f3">
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
         <div class="col-md-8">
            <label for="f8" class="form-label">Dirección</label>
            <input type="text" name='direccion' class="form-control" id="f8">
         </div> 
         <div class="col-md-4">
            <label for="f9" class="form-label">Celular</label>
            <input type="text" name='celular' class="form-control" id="f9">
         </div>
         <div class="col-md-6">
            <label for="f9" class="form-label">Funcionario de la fiscalida de </label>
            <input type="text" name='fiscalia_otro' class="form-control" id="f9">
         </div> 
         <div class="col-md-6">
            <label for="f9" class="form-label">Unidad</label>
            <input type="text" name='unidad' class="form-control" id="f9">
         </div>
         <div>
            <label for="fecha_registro">FECHA DE REGISTRO</label>
            <input type="date" name='fecha_registro'>
            <br>
            <label for="id_usuario">Usuario</label>
            <input type="text" name='id_usuario'>
            <br> 
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
         </div> 
</form>
@stop