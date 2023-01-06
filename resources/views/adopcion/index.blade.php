@extends('home')

@section('contenido')
<table class="table table-ligth">
    <thead class="thealight">
        <tr> 
            <th>N°</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Funcionario/a</th>
            <th>Parentesco</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($adopciones as $adopcion)
        <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>{{$adopcion->nombres}}</td>
            <td>{{$adopcion->apellido_paterno}}</td>
            <td>{{$adopcion->apellido_materno}}</td>
            <td>{{$adopcion->nombre}}</td>
            <td>{{$adopcion->parentesco}}</td>
            <td>
                <script>
                    function EliminarRegistro(value){
                        action = confirm(value) ? true: event.preventDefault()
                    }
                </script>
                @if($errors->any())
               <p class="error-message">{{$errors->first('mensaje')}}</p>
               @endif
               <br>
                <a href="{{ route('adopcion.edit', $adopcion->id) }}">
                    <input type="submit" value="Editar" onclick="return EditarRegistro('Editar Pariente')"></a>
                <form action="{{ route('adopcion.destroy', $adopcion->id) }}" method ="POST" >
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Eliminar" onclick="return EliminarRegistro('Eliminar Pariente')">
                </form>
                
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
@stop