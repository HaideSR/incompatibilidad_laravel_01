@extends('home')

@section('contenido')
<div class="card">
   <div class="card-body">
      <h4> Documento Aprobado</span>
         <div class="row">

            <div class="col-12">
               <iframe width="100%" height="100%" src="{{env('DOMINIO_PUBLICO')}}/{{$registro->archivo}}" frameborder="0"></iframe>
            </div>
            <div class="col-12">
               <table class="table table-ligth mt">
                  <thead class="thealight">
                     <tr class="table-primary">
                        <th>Nombre Aprobador</th>
                        <th>Documento</th>
                        <th>Fecha de Aprobacion</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($aprobaciones as $aprobacion)
                     <tr class="table-light">
                        <td>{{$aprobacion['nombres'] }} {{ $aprobacion['primer_apellido'] }} {{ $aprobacion['segundo_apellido'] }} </td>
                        <td>{{$aprobacion['descripcion'] }}</td>
                        <td>{{$aprobacion['fechaSolicitud']}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
   </div>

   @stop