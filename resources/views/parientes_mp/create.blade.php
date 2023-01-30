@extends('home')
@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Agregar Parientes</h4>
      <form action="{{'/parientes_mp'}}" method="post" enctype="multipart/form-data" class="row g-3">
         @csrf
         <input type="hidden" value="{{request()->query('sino')}}" name="id_mp_si_no">
         <input type="hidden" value="{{request()->query('idF')}}" name="id_funcionario">
         <div class="col-md-4">
            <label for="apellido_paterno" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" id="apellido_paterno">
         </div>
         <div class="col-md-4">
            <label for="apellido_materno" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" class="form-control" id="apellido_materno" required>
         </div>
         <div class="col-md-4">
            <label for="c-1" class="form-label">Nombres</label>
            <input type="text" name="nombre" class="form-control" id="c-1" required>
         </div>
         <div class="col-md-4">
            <label for="c-2" class="form-label">Parentesco</label>
            <input type="text" name="parentesco" class="form-control" id="c-2">
         </div>
         <div class="col-md-4">
            <label for="c-3" class="form-label">Fiscalia Perteneciente</label>
            <input type="text" name="fiscalia_otro" class="form-control" id="c-3">
         </div>
         <div class="col-md-4">
            <label for="c-4" class="form-label">Dirección Organizacional</label>
            <input type="text" name="direccion_jefatura_unidad" class="form-control" id="c-4">
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{request()->query('idF')}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar Pariente</button>
         </div>
      </form>
   </div>
</div>
@stop