@extends('home')

@section('contenido')
<div class="card">
   <div class="card-body">
      <a href="{{ route('funcionario.create','index') }}" class="btn btn-primary">
         <i class="icon-add"></i>
         <span>Registrar Funcionario</span>
      </a>
      <table class="table table-ligth mt">
         <thead class="thealight">
            <tr> 
               <th>#</th>
               <th>Carnet de Identidad</th>
               <th>Complemento</th>
               <th>Expedido</th>
               <th>Nombres</th>
               <th>Apellido Paterno</th>
               <th>Apellido Materno</th>
               <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            @foreach($funcionarios as $funcionario)
            <tr>
               <td>{{$funcionario->id}}</td>
               <td>{{$funcionario->numero_ci}}</td>
               <td>{{$funcionario->complemento}}</td>
               <td>{{$funcionario->expedido}}</td>
               <td>{{$funcionario->nombres}}</td>
               <td>{{$funcionario->apellido_paterno}}</td>
               <td>{{$funcionario->apellido_materno}}</td> 
               <td>
                  <a href="{{ route('funcionario.show', $funcionario->id) }}" class="btn btn-sm btn-outline-primary">
                     <i class="icon-remove_red_eye"></i>
                  </a> 
                  <a href="{{ route('funcionario.edit', $funcionario->id) }}" class="btn btn-sm btn-outline-info">
                     <i class="icon-create"></i>
                  </a>
                  <form action="{{ route('funcionario.destroy', $funcionario->id ) }}" method ="POST" class="inline">
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