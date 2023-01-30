@extends('home')
@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Editar Parientes</h4>
      <form action="{{ route('parientes_mp.update', $parienteMp->id) }}" method="post" enctype="multipart/form-data" class="row g-3">
         @csrf
         {{ method_field('PUT') }}
         <div class="col-md-4">
            <label for="f1" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" value="{{ $parienteMp->apellido_paterno }}" class="form-control" id="f1">
         </div>
         <div class="col-md-4">
            <label for="f2" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" value="{{ $parienteMp->apellido_materno }}" class="form-control" id="f2" required>
         </div>
         <div class="col-md-4">
            <label for="c-1" class="form-label">Nombres</label>
            <input type="text" name="nombre" class="form-control" value="{{ $parienteMp->nombre }}" id="c-1" required>
         </div>
         <div class="col-md-4">
            <label for="c-2" class="form-label">Parentesco</label>
            <input type="text" name="parentesco" value="{{ $parienteMp->parentesco }}" class="form-control" id="c-2">
         </div>
         <div class="col-md-4">
            <label for="c-3" class="form-label">Fiscalia Perteneciente</label>
            <input type="text" name="fiscalia_otro" value="{{ $parienteMp->fiscalia_otro }}" class="form-control" id="c-3">
         </div>
         <div class="col-md-4">
            <label for="c-4" class="form-label">Dirección Organizacional</label>
            <input type="text" name="direccion_jefatura_unidad" value="{{ $parienteMp->direccion_jefatura_unidad }}" class="form-control" id="c-4">
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{$parienteMp->id_funcionario}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
         </div>
      </form>
   </div>
</div>
@stop