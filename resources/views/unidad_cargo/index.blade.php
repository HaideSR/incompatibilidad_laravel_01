@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('unidad_cargo.create','index') }}" class="btn btn-primary">
          <i class="icon-add"></i>
          <span></span>
       </a>
<table class="table table-ligth mt">
    <thead class="thealight">
        <tr> 
            <th>Id UnidadCargo</th>
            <th>Unidad</th>
            <th>Cargo</th>
            <th>Fiscalia/otro</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($t_unidadCargos as $t_unidadCargo)
        <tr>
            <td>{{$t_unidadCargo->id}}</td>
            <td>{{$t_unidadCargo->unidad}}</td>
            <td>{{$t_unidadCargo->cargo}}</td>
            <td>{{$t_unidadCargo->denominacion}}</td>
            <td>
                <a href="{{ route('unidad_cargo.edit', $t_unidadCargo->id) }}" class="btn btn-sm btn-outline-info">
                    <i class="icon-create"></i>
                 </a>
                 <form action="{{ route('unidad_cargo.destroy', $t_unidadCargo->id ) }}" method ="POST" class="inline">
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
