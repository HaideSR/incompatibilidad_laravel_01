@extends('home')
@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Editar Familiar por afinidad</h4>
      <form action="{{ route('afinidad.update', $afinidad->id) }}" method="POST" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}
         <div class="col-md-4">
            <label for="f4" class="form-label">Apellido paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" value="{{ $afinidad->apellido_paterno }}" id="f4">
         </div>
         <div class="col-md-4">
            <label for="f5" class="form-label">Apellido materno</label>
            <input type="text" name="apellido_materno" class="form-control" value="{{ $afinidad->apellido_materno }}" id="f5" required>
         </div>
         <div class="col-md-4">
            <label for="f6" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="f6" value="{{ $afinidad->nombres }}" required>
         </div>
         <div class="col-md-6">
            <label for="">Parentesco</label>
            <select name="id_parentesco" class="form-control">
               <option value="">--seleccionar--</option>
                  @foreach($parentescos as $parentesco)
                  <option value="{{$parentesco['id']}}" @selected( $parentesco['id'] == $afinidad['id_parentesco'])>{{$parentesco['parentesco']}}</option>
                  @endforeach
            </select>
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{$afinidad->id_funcionario}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar cambios </button>
         </div>
         {{-- <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
         </div> --}}
      </form>
   </div>
</div>
@stop
