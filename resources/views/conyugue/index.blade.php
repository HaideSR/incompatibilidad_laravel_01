@extends('home')

@section('contenido')
<div class="card">
    <div class="card-body">
       <a href="{{ route('conyugue.create','index') }}" class="btn btn-primary">
          
          <span>Registrar Conyugue</span>
       </a>
<table class="table table-ligth mt">
    <thead class="thealight">
        <tr> 
            <th>Id Conyugue</th>
            <th>Cedula de Identidad</th>
            <th>Complemento</th>
            <th>Expedido</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombres</th>
            <th>Direccion</th>
            {{--<th>Funcionario</th>--}}
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($conyugue as $conyugue)
        <tr>
            <td>{{$conyugue->id}}</td>
            <td>{{$conyugue->numero_ci}}</td>
            <td>{{$conyugue->complemento}}</td>
            <td>{{$conyugue->expedido}}</td>
            <td>{{$conyugue->apellido_paterno}}</td>
            <td>{{$conyugue->apellido_materno}}</td>
            <td>{{$conyugue->nombre}}</td>
            <td>{{$conyugue->direccion}}</td>
            <td>
                <a href="{{ route('conyugue.edit', $conyugue->id) }}" class="btn btn-sm btn-outline-info">
                    <i class="icon-create"></i>
                 </a>
                 <form action="{{ route('conyugue.destroy', $conyugue->id ) }}" method ="POST" class="inline">
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
