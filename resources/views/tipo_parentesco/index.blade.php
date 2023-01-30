@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('tipo_parentesco.create','index') }}" class="btn btn-primary">
          <i class="icon-add"></i>
          <span>Registrar Tipo Parentesco</span>
       </a>
<table class="table table-ligth mt">
    <thead class="thealight">
        <tr> 
          
            <th>Tipo Parentesco</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($tipo_parentescos as $tipo_parentesco)
        <tr>
    
            <td>{{$tipo_parentesco->tipo_parentesco}}</td>
            <td>
                <a href="{{ route('tipo_parentesco.edit', $tipo_parentesco->id) }}" class="btn btn-sm btn-outline-info">
                    <i class="icon-create"></i>
                 </a>
                 <form action="{{ route('tipo_parentesco.destroy', $tipo_parentesco->id ) }}" method ="POST" class="inline">
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

