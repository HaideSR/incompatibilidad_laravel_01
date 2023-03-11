@extends('home')
@section('contenido')
   <div class="card max-800">
      <div class="card-body-form">
         <h4 class="text-center title-frm">Agregar Denuncia</h4>
         <form action="{{ '/denuncia' }}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
            {{-- <input type="hidden" value="{{request()->query('idF')}}" name="id_funcionario"> --}}
            <input type="hidden" value="{{ Session::get('id') }}" name="id_funcionario">
            @csrf
            <div class="col-md-4">
               <label for="f1" class="form-label">Cédula Identidad</label>
               <input type="text" name="numero_ci" class="form-control" id="f1" required>
            </div>
            <div class="col-md-4">
               <label for="f3" class="form-label">Nombres Apellidos/Denunciado</label>
               <input type="text" name="nombres_apellidos" class="form-control" id="f3">
            </div>
            <div class="col-md-4">
               <label for="f2" class="form-label">Fecha denuncia</label>
               <input type="date" name="fecha_denuncia" class="form-control" id="f2" required>
            </div>
            <div class="col-md-6">
               <label for="f4" class="form-label">Fiscalia/Otro</label>
               <input type="text" name="fiscalia_otro" class="form-control" id="f4">
            </div>
            <div class="col-md-6">
               <label for="f5" class="form-label">Direccion Jefatura/ Unidad</label>
               <input type="text" name="direccion_jefatura_unidad" class="form-control" id="f5" required>
            </div>
            <div class="col-md-12">
               <label for="f6" class="form-label">Detalles Denuncia</label>
               <input type="text" name="detalles" class="form-control" id="f6" required>
            </div>
            <div class="d-flex justify-content-around bx--btns">
               <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
               <button class="btn btn-primary" type="submit">Registrar </button>
            </div>
         </form>
      </div>
   </div>
@stop