@extends('home')

@section('contenido')
   <div class="card">
      <div class="card-body">
         <a href="{{ route('subir_declaracion.create', 'index') }}" class="btn btn-primary">
            <i class="icon-add"></i>
            <span></span>
         </a>
         <table class="table table-ligth mt">
            <thead class="thealight">
               <tr class="table-primary">
                  <th>Código</th>
                  <th>Cedula Identidad</th>
                  <th>Fecha</th>
                  <th>Motivo</th>
                  <th>Archivo</th>
                  <th> </th>
                  <th>Estado</th>
                  <th>Acciones</th>

               </tr>
            </thead>
            <tbody>
               @foreach ($t_estado_declaracion as $estadodeclaracion)
                  <tr class="table-light">
                     <td>{{ $estadodeclaracion->codigo }}</td>
                     <td>{{ $estadodeclaracion->numero_ci }}</td>
                     <td>{{ $estadodeclaracion->fecha }}</td>
                     <td>{{ $estadodeclaracion->motivo }}</td>
                     <td>
                        <iframe width="180" height="120"
                           src="{{ env('DOMINIO_PUBLICO') }}/{{ $estadodeclaracion->archivo }}" frameborder="0"></iframe>
                     </td>
                     <td>
                        <a href="{{ env('DOMINIO_PUBLICO') }}/{{ $estadodeclaracion->archivo }}" target="_blank">
                           Ver archivo
                        </a>
                     </td>
                     <td>{{ $estadodeclaracion->estado }}</td>

                     <td>
                        {{-- <a href="{{ route('subir_declaracion.show', $estadodeclaracion->id) }}" class="btn btn-sm btn-outline-primary">
                     <i class="icon-remove_red_eye"></i>
                  </a> 
                  <a href="{{ route('subir_declaracion.edit', $estadodeclaracion->id) }}" class="btn btn-sm btn-outline-info">
                     <i class="icon-create"></i>
                  </a> --}}
                        <form action="{{ route('subir_declaracion.destroy', $estadodeclaracion->id) }}" method="POST"
                           class="inline">
                           @csrf
                           {{ method_field('DELETE') }}
                           <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar?')"
                              class="btn btn-sm btn-outline-danger" button title="Eliminar">
                              <i class="icon-delete"></i>
                           </button>
                        </form>
                        <!-- si permiteAprobar mostrarmos boton de aprrobar -->
                        @if ($estadodeclaracion->permiteAprobar)
                           <a href="{{ $estadodeclaracion->aprovationUrl }}" target="_blank"
                              class="btn btn-sm btn-outline-success" button title="Aprobar">

                           </a>
                        @endIf
                        <br />
                        @if ($estadodeclaracion->estado_aprobacion_cd)
                           <span class="text-success"> Documento Aprobado</span>
                           <a href="{{ route('verDocumentoAprobado', $estadodeclaracion->id) }}"
                              class="btn btn-sm btn-outline-primary">
                              ver aprobaciones
                           </a>
                        @endIf

                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
@stop
