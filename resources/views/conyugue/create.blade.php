@extends('home')

@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Agregar Conyugue</h4>
      <form action="{{'/conyugue'}}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
         @csrf
         <input type="hidden" value="{{request()->query('idF')}}" name="id_funcionario">
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
         <div class="col-md-4">
            <label for="f4" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" id="f4">
         </div>
         <div class="col-md-4">
            <label for="f5" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" class="form-control" id="f5" required>
         </div>
         <div class="col-md-4">
            <label for="f6" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="f6" required>
         </div>
         <div class="col-md-6">
            <label for="f7" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="f7" required>
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{request()->query('idF')}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar Conyugue</button>
         </div>
      </form>
   </div>
</div>
@stop