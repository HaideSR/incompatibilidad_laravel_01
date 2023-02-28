@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('unidades.create','index') }}" class="btn btn-primary">
          <i class="icon-add"></i>
          <span></span>
       </a>
   <table class="table table-ligth mt">
      <thead class="thealight">
         <tr> 
            <th>#</th>
            <th>Nombre de la unidad</th>
            <th>Acciones</th>
         </tr>
      </thead>
      <tbody>
         @foreach($unidades as $unidad)
         <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{$unidad->nombre}}</td>
            <td>
               <a href="{{ route('unidades.edit', $unidad->id) }}" class="btn btn-sm btn-outline-info">
                  <i class="icon-create"></i>
               </a>
               <form action="{{ route('unidades.destroy', $unidad->id ) }}" method ="POST" class="inline">
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
   </div>
</div>
@stop
