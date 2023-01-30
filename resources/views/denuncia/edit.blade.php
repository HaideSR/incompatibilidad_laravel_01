@extends('home')
@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Editar Denuncia</h4>
      <form action="{{ route('denuncia.update', $denuncia->id) }}" method="POST" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}
         <div class="row">
            <div class="col">
               <label class="form-label">Numero Ci:</label>
               <input type="text" name="numero_ci" value="{{ $denuncia->numero_ci }}" class="form-control">
            </div>
         </div>

         <div class="row">
            <div class="col">
               <label class="form-label">Fecha Denuncia</label>
               <input type="date" name="fecha_denuncia" value="{{ $denuncia->fecha_denuncia }}" class="form-control">
            </div>
            <div class="col">
               <label class="form-label">Nombre/Denunciado</label>
               <input type="text" name="nombres_apellidos" value="{{ $denuncia->nombres_apellidos }}" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Fiscalia/otro</label>
                <input type="text" name="fiscalia_otro" value="{{ $denuncia->fiscalia_otro }}" class="form-control">
             </div>
             <div class="col">
                <label class="form-label">Direccion</label>
                <input type="text" name="direccion_jefatura_unidad" value="{{ $denuncia->direccion_jefatura_unidad }}" class="form-control">
             </div>
             <div class="col">
                <label class="form-label">Detalles</label>
                <input type="text" name="detalles" value="{{ $denuncia->detalles }}" class="form-control">
             </div>
         </div>
        
         <div class="d-flex justify-content-around bx--btns">
            <a href="/denuncia" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
         </div>
      </form>
   </div><
</div>
@stop
