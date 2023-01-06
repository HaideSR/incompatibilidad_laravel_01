@extends('home')
@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Familiar por afinidad</h4>
      <form action="{{'/afinidad'}}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
         @csrf
         <input type="hidden" value="{{request()->query('idF')}}" name="id_funcionario">
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
            <label for="">Parentesco</label>
            <select name="id_parentesco" class="form-control">
               <option value="">--seleccionar--</option>
                  @foreach($parentescos as $parentesco)
                  <option value="{{$parentesco['id']}}">{{$parentesco['parentesco']}}</option>
                  @endforeach
            </select>
         </div>
         <div class="col-md-6">
            <label for="f6" class="form-label">Parentesco *</label>
            <input type="text" name="parentesco" class="form-control" id="f6" required>
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{request()->query('idF')}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Registrar </button>
         </div>
         {{-- <div>
            <label for="">Funcionario:</label>
            <select name="id_funcionario"  class="form-control">
                  <option value="">-funcionario</option>
                     @foreach($funcionarios as $funcionario)
                     <option value="{{$funcionario['id']}}">{{$funcionario['nombres']}}</option>
                     @endforeach
            </select>
            </div> --}}
      </form>
   </div>
</div>
@stop