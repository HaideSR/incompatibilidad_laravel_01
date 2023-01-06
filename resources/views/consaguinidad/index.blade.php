@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('consaguinidad.create','index') }}" class="btn btn-primary">
          <i class="icon-add"></i>
          <span>Registrar Pariente</span>
       </a>
<table class="table table-ligth mt">
    <thead class="thealight">
        <tr> 
       
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Funcionario/a</th>
            <th>Parentesco</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($consaguinidad as $consaguinidad)
        <tr>
            <td>{{$consaguinidad->nombres}}</td>
            <td>{{$consaguinidad->apellido_paterno}}</td>
            <td>{{$consaguinidad->apellido_materno}}</td>
            <td>{{$consaguinidad->nombre}}</td>
            <td>{{$consaguinidad->parentesco}}</td>
            <td>
               @if($errors->any())
                  <p class="error-message">{{$errors->first('mensaje')}}</p>
               @endif
               
               <a href="{{ route('consaguinidad.edit', $consaguinidad->id) }}" class="btn btn-s btn-outline-info">
                  <i class="icon-create"></i>
               </a> 
               <form action="{{ route('consaguinidad.destroy', $consaguinidad->id ) }}" method ="POST" class="inline">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar?')"  class="btn btn-sm btn-outline-danger">
                     <i class="icon-delete"></i>
                  </button>
               </form>
                               
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
@stop
