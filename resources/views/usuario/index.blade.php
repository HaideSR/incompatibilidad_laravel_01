@extends('home')

@section('contenido')
   <div class="card">
      <div class="card-body">
         <a href="{{ route('usuarios.create', 'index') }}" class="btn btn-primary">
            <i class="icon-add"></i>
            <span>Registrar usuario</span>
         </a>
         <div class="mt">
            <form action="/usuarios" method="GET" class="flex">
               <input name="ci" type="text" value="{{request()->query('ci')}}" placeholder="Buscar funcionario por C.I" class="form-control mx-38x">
               {{-- <select name="nivel" class="form-control mx-20x">
                  <option @selected( request()->query('nivel') == 'ADMIN') value="ADMIN">Administrador</option>
                  <option @selected( request()->query('nivel') == 'FUNCIONARIO') value="FUNCIONARIO">Funcionario</option>
               </select> --}}
               <button class="flex flex-center-ai btn btn-success">
                  <i class="icon-search"></i>
                  <span> Buscar</span>
               </button>
            </form>
         </div>
         <table class="table table-ligth mt">
            <thead class="thealight">
               <tr>
                  <th>#</th>
                  <th>Nombres</th>
                  <th>Cédula Identidad</th>
                  <th>Email</th>
                  <th>Nivel</th>
                  <th>Estado</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($usuarios as $user)
                  <tr>
                     <td>{{ $loop->index + 1}}</td>
                     <td>
                        @if( isset($user->nombres))
                           {{ $user->nombres }}
                        @else
                           -
                        @endif
                     </td>
                     <td>
                        @if( isset($user->numero_ci))
                           {{ $user->numero_ci }}
                        @else
                           -
                        @endif
                     </td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->nivel }}</td>
                     <td>{{ $user->estado ? 'Activo':'Suspendido' }}</td> 
                     <td>
                        {{-- <a href="{{ route('usuario.show', $user->id) }}" class="btn btn-sm btn-outline-primary">
                           <i class="icon-remove_red_eye"></i>
                        </a> --}}
                        <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-sm btn-outline-info">
                           <i class="icon-create"></i>
                        </a>
                        <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="inline">
                           @csrf
                           {{ method_field('DELETE') }}
                           <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar?')"
                              class="btn btn-sm btn-outline-danger">
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
