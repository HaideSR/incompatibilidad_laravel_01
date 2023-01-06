@extends('home')
@section('contenido')

<div class="card max-800">
   <div class="card-body">
      <h4 class="text-center title-frm">Editar Pariente</h4>
      <form action="{{ route('consaguinidad.update', $consaguinidad->id) }}" method="POST" class="row g-3 form-register">
         @csrf
         {{ method_field('PUT') }}
         <div class="row">
            <div class="col">
               <label class="form-label">Nombres</label>
               <input type="text" name="nombres" value="{{ $consaguinidad->nombres }}" class="form-control">
            </div>
         </div>

         <div class="row">
            <div class="col">
               <label class="form-label">Apellido Paterno</label>
               <input type="text" name="apellido_paterno" value="{{ $consaguinidad->apellido_paterno }}"
                  class="form-control">
            </div>
            <div class="col">
               <label class="form-label">Apellido Materno</label>
               <input type="text" name="apellido_materno" value="{{ $consaguinidad->apellido_materno }}"
                  class="form-control">
            </div>
         </div>
         <div>
            <label class="form-label" for="id_par">Parentesco</label>
            <select name="id_parentesco" class="form-control" required>
               @foreach($parentescos as $parentesco)
               <option value="{{$parentesco['id']}}" @selected( $parentesco['id'] == $consaguinidad['id_parentesco'])>{{$parentesco['parentesco']}}</option>
               @endforeach
            </select>
         </div>
         <div class="d-flex justify-content-around bx--btns">
            <a href="/funcionario/{{$consaguinidad->id_funcionario}}" class="btn btn-light">Cancelar</a>
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
         </div>
      </form>
   </div>
</div>
@stop
