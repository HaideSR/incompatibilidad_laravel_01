@extends('home')

@section('contenido')
<table class="table table-ligth">
    <thead class="thealight">
        <tr> 

            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Parentesco</th>
            <th>Fiscalia Perteneciente</th>
            <th>Unidad</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($parientes_mp as $persona)
        <tr>
            <td>{{$persona->nombre}}</td>
            <td>{{$persona->apellido_paterno}}</td>
            <td>{{$persona->apellido_materno}}</td>
            <td>{{$persona->parentesco}}</td>
            <td>{{$persona->fiscalia_otro}}</td>
            <td>{{$persona->direccion_jefatura_unidad}}</td>
            {{--<td>{{$persona->nombres}}</td>--}}
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
                {{-- <a href="{{ route('persona.edit',$persona->id) }}">
                    <input type="submit" value="Editar" onclick="return EditarRegistro('Editar persona')">
                  </a>
                <form action="{{ route('persona.destroy',$persona->id) }}" method ="POST" >
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Eliminar" onclick="return EliminarRegistro('Eliminar persona')">
                </form> --}}
                
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
@stop
