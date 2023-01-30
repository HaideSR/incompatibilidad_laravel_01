@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('motivo_declaracion.create','index') }}" class="btn btn-primary">
          <i class="icon-add"></i>
          <span>Registrar Motivo</span>
       </a>
<table class="table table-ligth mt">
    <thead class="thealight">
        <tr> 
            <th>Motivo</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($motivodeclaraciones as $motivodeclaracion)
        <tr>
            <td>{{$motivodeclaracion->motivo}}</td>
            <td>
               
                <a href="{{ route('motivo_declaracion.edit', $motivodeclaracion->id) }}" class="btn btn-sm btn-outline-info">
                    <i class="icon-create"></i>
                 </a>
                 <form action="{{ route('motivo_declaracion.destroy', $motivodeclaracion->id ) }}" method ="POST" class="inline">
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
