@extends('home')
@section('contenido')
<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Agregar tipo de causal</h4>
      <form action="{{'/tipos_causal_incompatibilidad'}}" method="post" enctype="multipart/form-data"  class="row g-3 form-register">
         @csrf
         <div class="col-md-12">
            <label for="f4" class="form-label">Incompatibilidad</label>
            <input type="text" name="incompatibilidad" class="form-control" id="f4" required>
         </div>
         <div class="col-md-12">
            <label for="f6" class="form-label">Tipo de Actividad</label>
            <input type="text" name="tipo_actividad" class="form-control" id="f6">
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/tipos_causal_incompatibilidad" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
         </div>
      </form>
   </div>
</div>
@stop