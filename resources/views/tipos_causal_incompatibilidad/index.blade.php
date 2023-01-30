@extends('home')

@section('contenido')
<div class="card">
   <div class="card-body">
      <a href="{{ route('tipos_causal_incompatibilidad.create') }}" class="btn btn-primary">
         <i class="icon-add"></i>
         <span>Registrar tipo de causal</span>
      </a>
      <table class="table table-ligth mt">
         <thead class="thealight">
            <tr> 
                  <th>N°</th>
                  <th>Incompatibilidad</th>
                  <th>Tipo de actividad</th>
                  <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            @foreach($tipos as $tipo)
            <tr>
                  <td>{{ $loop->index + 1}}</td>
                  <td>{{$tipo->incompatibilidad}}</td>
                  <td>{{$tipo->tipo_actividad}}</td>
                  <td>
                     <a href="{{ route('tipos_causal_incompatibilidad.edit', $tipo->id) }}" class="btn btn-sm btn-outline-info">
                        <i class="icon-create"></i>
                        
                     </a>
                     <form action="{{ route('tipos_causal_incompatibilidad.destroy', $tipo->id) }}" method="POST" class="inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar?')" class="btn btn-sm btn-outline-danger">
                           <i class="icon-delete"></i>
                           
                        </button>
                     </form>
                  </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@stop
