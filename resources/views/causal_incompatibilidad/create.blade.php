@extends('home')
@section('contenido')
<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Agregar </h4>
      <form action="{{'/causal'}}" method="post" enctype="multipart/form-data"  class="row g-3 form-register">
         @csrf
         <input type="hidden" value="{{request()->query('idF')}}" name="id_funcionario">
         <input type="hidden" value="{{request()->query('idTipoCausal')}}" name="id_tipo_causal">
         <p class="form-label">{{$tipocausal->incompatibilidad}}</p>
         <p class="form-label">{{$tipocausal->tipo_actividad}}</p>
         <div class="col-md-12">
            <div class="form-check">
               <input class="form-check-input" value="1" type="radio" name="estado" id="r1" required>
               <label class="form-check-label" for="r1">Si</label>
            </div>
            <div class="form-check">
               <input class="form-check-input" value="0" type="radio" name="estado" id="r2" required>
               <label class="form-check-label" for="r2">No</label>
            </div>
         </div>
         <div class="col-md-12">
            <label for="f6" class="form-label">Descripción</label>
            <input type="text" name="descripcion" class="form-control">
         </div>
         
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{request()->query('idF')}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
         </div>
      </form>
      
   </div>
</div>
@stop