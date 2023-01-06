@extends('home')

@section('contenido')
<div class="card">
   <div class="accordion m" id="acordion">
      <div class="mb">
         <div class="flex-sb">
            <a href="/funcionario/{{request()->funcionario}}/edit" class="btn btn-outline-primary">
               <i class="icon-create"></i>
               <span>Editar</span>
            </a>
            <a href="/funcionario-pdf?&idF={{request()->funcionario}}" type="button" class="btn btn-outline-success">
               <i class=" icon-file_download"></i>
               <span>Descargar PDF</span>
            </a>
         </div>
      </div>
         @include('funcionario.partes.datos_funcionario', ['funcionario' => $funcionario])
         <div id="multi-step-form-container">
            <ul id="grupotabs" class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
               @include('funcionario.partes.tab_opcion', ['nombre' => 'Datos del conyugue o conviviente', 'nro' => '2'])
               @include('funcionario.partes.tab_opcion', ['nombre' => 'Relaciones de parentesco por consanguinidad', 'nro' => '3'])
               @include('funcionario.partes.tab_opcion', ['nombre' => 'Relaciones de parentesco por afinidad', 'nro' => '4'])
               @include('funcionario.partes.tab_opcion', ['nombre' => 'Relación por adopción', 'nro' => '5'])
               @include('funcionario.partes.tab_opcion', ['nombre' => 'Parientes que trabajan en el Ministerio Público', 'nro' => '6'])
               @if ($si_no && ($si_no->afinidad === 1  || $si_no->consanguinidad === 1))
                  @include('funcionario.partes.tab_opcion', ['nombre' => 'Detallar parientes hasta el 4º grado de Consanguinidad y 2º grado de afinidad que trabajan en el Ministerio Públicio', 'nro' => '6.1'])
               @endif
               @include('funcionario.partes.tab_opcion', ['nombre' => 'Causal de Incompatibilidad en el Ministero Público', 'nro' => '7'])
            </ul>
            <div id="grupos">
               @include('funcionario.partes.seccion_01', ['conyugues' => $conyugue, 'nro' => '2'])
               @include('funcionario.partes.seccion_02', ['consaguinidades' => $consaguinidad, 'nro'=> '3'])
               @include('funcionario.partes.seccion_03', ['afinidad' => $afinidad, 'nro'=> '4'])
               @include('funcionario.partes.seccion_04', ['adopcion' => $adopcion, 'nro'=> '5'])
               @include('funcionario.partes.seccion_05', ['si_no' => $si_no, 'nro'=> '6']) 
               @if ($si_no && ($si_no->afinidad === 1  || $si_no->consanguinidad === 1))
                  @include('funcionario.partes.seccion_06', ['parientes_mp' => $parientes_mp, 'si_no' => $si_no, 'nro'=> '6_1'])
               @endif
               @include('funcionario.partes.seccion_07', ['causalRespuestas' => $causalRespuestas, 'tiposCausales' => $tiposCausales, 'nro'=> '7'])
            </div>
            <div class="d-flex justify-content-around bx--btns">
               <button id="prev" class="btn btn-primary">
                  <i class="icon-arrow_back"></i>
                  <span>Anterior</span>
               </button>
               <button id="next" class="btn btn-primary">
                  <span>Siguiente</span>
                  <i class="icon-arrow_forward"></i>
               </button>
            </div>
         </div>
      {{-- @include('funcionario.partes.seccion_01', ['conyugues' => $conyugue, 'nro' => '2'])
      @include('funcionario.partes.seccion_02', ['consaguinidades' => $consaguinidad, 'nro'=> '3']) 
      @include('funcionario.partes.seccion_03', ['afinidad' => $afinidad, 'nro'=> '4'])--}}
      
   </div>
</div>
@stop
