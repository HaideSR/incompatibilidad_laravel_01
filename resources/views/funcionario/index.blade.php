@extends('home')

@section('contenido')
   <div class="card">
      <div class="card-body">

         @if (!Auth::user()->confirmado && !Session::get('isAdmin'))
            {{-- <div class="card text-center mb">
               <div class="card-body">
                  <h5 class="card-title">Verificar correo electrónico</h5>
                  <p class="card-text">Antes de continuar debemos valiadar que su correo le pertenece</p>
                  <a href="#" class="btn btn-warning">Enviar código de verificación</a>
               </div>
            </div> --}}
         @endif
         @if (Session::get('isAdmin'))
            <a href="{{ route('funcionario.create') }}" class="btn btn-primary">
               <i class="icon-add"></i>
               <span>Registrar Funcionario</span>
            </a>
            <div class="mt mx-38x">
               <form action="/funcionario" method="GET" class="flex">
                  <input name="ci" type="text" value="{{request()->query('ci')}}" placeholder="Buscar funcionario por C.I" class="form-control">
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
                  @foreach ($funcionarios as $funcionario)
                     <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->numero_ci }}</td>
                        <td>{{ $funcionario->complemento }}</td>
                        <td>{{ $funcionario->expedido }}</td>
                        <td>{{ $funcionario->nombres }}</td>
                        <td>{{ $funcionario->apellido_paterno }}</td>
                        <td>{{ $funcionario->apellido_materno }}</td>
                        <td>
                           <a href="{{ route('funcionario.show', $funcionario->id) }}"
                              class="btn btn-sm btn-outline-primary">
                              <i class="icon-remove_red_eye"></i>
                           </a>
                           <a href="{{ route('funcionario.edit', $funcionario->id) }}" class="btn btn-sm btn-outline-info">
                              <i class="icon-create"></i>
                           </a>
                           <form action="{{ route('funcionario.destroy', $funcionario->id) }}" method="POST"
                              class="inline">
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
         @else
            @if (Session::get('id_funcionario'))
               <div class="text-center">
                  <a href="{{ route('funcionario.show', Session::get('id_funcionario')) }}" class="btn btn-success">
                     <span>Ver mis datos</span>
                  </a>
               </div>
            @else
               <div class="text-center">
                  <a href="{{ route('funcionario.create') }}" class="btn btn-primary">
                     <i class="icon-add"></i>
                     <span>Completar mis datos</span>
                  </a>
               </div>
            @endif
         @endif
      </div>
   </div>
@stop
