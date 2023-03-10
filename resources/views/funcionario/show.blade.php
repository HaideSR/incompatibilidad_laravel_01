@extends('home')

@section('contenido')
   <div class="card">
      <div class="box-fun-full" id="acordion">
         <div class="mb">
            <div class="flex-sb">
               <div>
                  <a href="/funcionario/{{ request()->funcionario }}/edit" class="btn btn-outline-info mr-4" title="Editar">
                     <i class="icon-create"></i>
                  </a>
                  <a href="/subir_declaracion" class="btn btn-outline-warning mr-4" title="Declaraciones">
                     <i class="icon-library_add"></i>
                  </a>
                  @if ($formularioCompleto)
                     <a href="/funcionario-pdf?&idF={{ request()->funcionario }}" class="btn btn-outline-danger mr-4" title="PDF">
                        <i class="icon-file-pdf-o"></i>
                        <small>Descargar formulario</small>
                     </a>
                  @endif
               </div>
               <div>
                  @if ($formularioCompleto)
                     <a href="" class="btn btn-success">
                        <span>Enviar formulario</span>
                        <i class="icon-arrow_forward"></i>
                     </a>
                  @else
                     <div class="alert alert-warning align-items-center" role="alert">
                        <i class="icon-warning"></i>
                        <span>Debe llenar todos los datos requeridos </span>
                     </div>
                  @endif
               </div>
            </div>
         </div>
         @include('funcionario.partes.datos_funcionario', [
             'funcionario' => $funcionario,
             'fiscalia' => $fiscalia,
         ])
         <div id="multi-step-form-container">
            <ul id="grupotabs" class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
               @include('funcionario.partes.tab_opcion', [
                   'nombre' => 'Datos del conyugue o conviviente',
                   'nro' => '2',
               ])
               @include('funcionario.partes.tab_opcion', [
                   'nombre' => 'Relaciones de parentesco por consanguinidad',
                   'nro' => '3',
               ])
               @include('funcionario.partes.tab_opcion', [
                   'nombre' => 'Relaciones de parentesco por afinidad',
                   'nro' => '4',
               ])
               @include('funcionario.partes.tab_opcion', [
                   'nombre' => 'Relación por adopción',
                   'nro' => '5',
               ])
               @include('funcionario.partes.tab_opcion', [
                   'nombre' => 'Parientes que trabajan en el Ministerio Público',
                   'nro' => '6',
               ])
               @if ($si_no && ($si_no->afinidad == 1 || $si_no->consanguinidad == 1))
                  @include('funcionario.partes.tab_opcion', [
                      'nombre' =>
                          'Detallar parientes hasta el 4º grado de Consanguinidad y 2º grado de afinidad que trabajan en el Ministerio Públicio',
                      'nro' => '6.1',
                  ])
               @endif
               @include('funcionario.partes.tab_opcion', [
                   'nombre' => 'Causal de Incompatibilidad en el Ministero Público',
                   'nro' => '7',
               ])
            </ul>
            <div id="grupos">
               @include('funcionario.partes.seccion_01', ['conyugues' => $conyugue, 'nro' => '2'])
               @include('funcionario.partes.seccion_02', [
                   'consaguinidades' => $consaguinidad,
                   'nro' => '3',
               ])
               @include('funcionario.partes.seccion_03', ['afinidad' => $afinidad, 'nro' => '4'])
               @include('funcionario.partes.seccion_04', ['adopcion' => $adopcion, 'nro' => '5'])
               @include('funcionario.partes.seccion_05', ['si_no' => $si_no, 'nro' => '6'])
               @if ($si_no && ($si_no->afinidad == 1 || $si_no->consanguinidad == 1))
                  @include('funcionario.partes.seccion_06', [
                      'parientes_mp' => $parientes_mp,
                      'si_no' => $si_no,
                      'nro' => '6_1',
                  ])
               @endif
               @include('funcionario.partes.seccion_07', [
                   'causalRespuestas' => $causalRespuestas,
                   'tiposCausales' => $tiposCausales,
                   'nro' => '7',
               ])
            </div>
            <div class="alert alert-warning align-items-center mt" id="alert-n" role="alert" style="display: none">
               <i class="icon-warning"></i>
               <span>Debe llenar el formulario antes de continuar</span>
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
      </div>
   </div>
@stop
