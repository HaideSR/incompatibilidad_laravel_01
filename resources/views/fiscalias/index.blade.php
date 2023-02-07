@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('fiscalias.create','index') }}" class="btn btn-primary">
          <i class="icon-add"></i>
          <span></span>
       </a>
<table class="table table-ligth mt">
    <thead class="thealight">
        <tr> 
            
            <th>Departamento</th>
            <th>Denominación</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($t_fiscalias as $t_fiscalias)
        <tr>
          
            <td>{{$t_fiscalias->departamento}}</td>
            <td>{{$t_fiscalias->denominacion}}</td>
            <td>
                <a href="{{ route('fiscalias.edit', $t_fiscalias->id) }}" class="btn btn-sm btn-outline-info">
                    <i class="icon-create"></i>
                 </a>
                 <form action="{{ route('fiscalias.destroy', $t_fiscalias->id ) }}" method ="POST" class="inline">
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
