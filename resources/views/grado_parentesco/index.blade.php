@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('grado_parentesco.create','index') }}" class="btn btn-primary">
          <i class="icon-add"></i>
          <span>Registrar Grado  Parentesco</span>
       </a>
<table class="table table-ligth mt">
    <thead class="thealight">
        <tr> 
            
            <th>Grados</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($t_grado as $t_grado)
        <tr>
    
            <td>{{$t_grado->grados}}</td>
            <td>
                <a href="{{ route('grado_parentesco.edit', $t_grado->id) }}" class="btn btn-sm btn-outline-info">
                    <i class="icon-create"></i>
                 </a>
                 <form action="{{ route('grado_parentesco.destroy', $t_grado->id ) }}" method ="POST" class="inline">
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
<p><a href="{{ route('grado_parentesco.create','index') }}">
    <input type="submit" value="Registrar Grado" onclick="return CrearRegistro('Crear Grado')"></a>
</p>
<br>
@stop
