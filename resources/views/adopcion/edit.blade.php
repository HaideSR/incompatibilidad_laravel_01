@extends('home')
@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Editar Familiar por adopción</h4>
      <form action="{{ route('adopcion.update', $adopcion->id) }}" method="POST" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}
         <div class="col-md-4">
            <label for="f4" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" value="{{ $adopcion->apellido_paterno }}" id="f4">
         </div>
         <div class="col-md-4">
            <label for="f5" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" class="form-control" value="{{ $adopcion->apellido_materno }}" id="f5" required>
         </div>
         <div class="col-md-4">
            <label for="f6" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="f6" value="{{ $adopcion->nombres }}" required>
         </div>

         <div class="col-md-6">
            <label for="">Parentesco</label>
            <select name="id_parentesco" class="form-control" required>
               @foreach($parentescos as $parentesco)
               <option value="{{$parentesco['id']}}" @selected( $parentesco['id']== $adopcion['id_parentesco'])>{{$parentesco['parentesco']}}</option>
               @endforeach
            </select>
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{$adopcion->id_funcionario}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar cambios </button>
         </div>
      </form>
   </div>
</div>
@stop
