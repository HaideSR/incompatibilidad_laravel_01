@extends('home')

@section('contenido')
<div class="card">
   <div class="card-body">
      <a href="{{ route('denuncia.create','index') }}" class="btn btn-primary">
         <i class="icon-add"></i>
         <span>Registrar Denuncia</span>
      </a>
      <table class="table table-ligth mt">
         <thead class="thealight">
            <tr> 
               <th>#</th>
               <th>Carnet de Identidad</th>
               <th>Fecha Denuncia</th>
               <th>Nombre Completo/Denunciante</th>
               <th>Direccion Jefatura</th>
               <th>Detalles</th>
               
               <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            @foreach($t_denuncias as $denuncia)
            <tr>
               <td>{{$denuncia->id}}</td>
               <td>{{$denuncia->numero_ci}}</td>
               <td>{{$denuncia->fecha_denuncia}}</td>
               <td>{{$denuncia->nombres_apellidos}}</td>
               <td>{{$denuncia->direccion_jefatura_unidad}}</td>
               <td>{{$denuncia->detalles}}</td>
           
               <td>
                  <a href="{{ route('denuncia.edit', $denuncia->id) }}" class="btn btn-sm btn-outline-info">
                     <i class="icon-create"></i>
                  </a>
                  <form action="{{ route('denuncia.destroy', $denuncia->id ) }}" method ="POST" class="inline">
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