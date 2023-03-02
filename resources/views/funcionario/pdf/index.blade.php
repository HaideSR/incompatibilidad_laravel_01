<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Declaración jurada de {{ $funcionario->nombres }}</title>
   {{-- <link rel="stylesheet" href="{{ URL::asset('css/app.css')}}"> --}}
   <link rel="stylesheet" href="./css/app.css">
   <link rel="stylesheet" href="./css/print-pdf.css">
</head>

<body>
   <div class="bx-pdf-print">
      <table class="tb-box-sup">
         <thead class="tb-sup">
            <tr>
               <td>
                  <div class="header-space pr-head">
                     <div class="pr-fixed-head text-center">
                        <img src="./img/escudo-bolivia.png" class="logo-sup" alt="Escudo">
                        <p class="bold">MINISTERIO PÚBLICO</p>
                        <p>JEFATURA NACIONAL DE RECURSOS HUMANOS</p>
                     </div>
                     <p class="bold text-center">DECLARACIÓN JURADA DE INEXISTENCIA DE INCOMPATIBILIDADES</p>
                  </div>
               </td>
            </tr>
         </thead>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Parte I: DATOS DEL FUNCIONARIO</p>
                     <table>
                        <tbody>
                           <tr>
                              <td>Cédula Identidad</td>
                              <td>{{ $funcionario->numero_ci }}</td>
                           </tr>
                           <tr>
                              <td>Complemento</td>
                              <td>{{ $funcionario->complemento }}</td>
                           </tr>
                           <tr>
                              <td>Expedido</td>
                              <td>{{ $funcionario->expedido }}</td>
                           </tr>
                           <tr>
                              <td>Nombres</td>
                              <td>{{ $funcionario->nombres }}</td>
                           </tr>
                           <tr>
                              <td>Apellido Paterno</td>
                              <td>{{ $funcionario->apellido_paterno }}</td>
                           </tr>
                           <tr>
                              <td>Apellido Materno</td>
                              <td>{{ $funcionario->apellido_materno }}</td>
                           </tr>
                           <tr>
                              <td>Fecha Nacimiento</td>
                              <td>{{ $funcionario->fecha_nacimiento }}</td>
                           </tr>
                           <tr>
                              <td>Estado Civil</td>
                              <td>{{ $funcionario->estado_civil }}</td>
                           </tr>
                           <tr>
                              <td>Dirección</td>
                              <td>{{ $funcionario->direccion }}</td>
                           </tr>
                           <tr>
                              <td>Teléfono/Celular</td>
                              <td>{{ $funcionario->celular }}</td>
                           </tr>
                           <tr>
                              <td>Fiscalía/Otro</td>
                              <td>
                                 @if($fiscalia)
                                 {{ $fiscalia->denominacion }}
                                 @endIf
                              </td>
                           </tr>
                           <tr>
                              <td>Unidad</td>
                              <td>
                              @if($unidad)   
                                 {{ $unidad->nombre }}
                              @endIf
                              </td>
                           </tr>
                           <tr>
                              <td>Cargo denominación ITEM/CONTRATO</td>
                              <td>
                              @if($cargo)   
                                 {{ $cargo->nombre }}
                              @endIf
                              </td>
                           </tr>
                           <tr>
                              <td>Fecha registro</td>
                              <td>{{ $funcionario->fecha_registro }}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Parte II: DATOS DEL CONYUGUE O CONVIVIENTE</p>
                     @foreach ($conyugues as $conyugue)
                        <table>
                           <tbody>
                              <tr>
                                 <td>Cédula Identidad</td>
                                 <td>{{ $conyugue->numero_ci }}</td>
                              </tr>
                              <tr>
                                 <td>Complemento</td>
                                 <td>{{ $conyugue->complemento }}</td>
                              </tr>
                              <tr>
                                 <td>Expedido</td>
                                 <td>{{ $conyugue->expedido }}</td>
                              </tr>
                              <tr>
                                 <td>Nombres</td>
                                 <td>{{ $conyugue->nombres }}</td>
                              </tr>
                              <tr>
                                 <td>Apellido Paterno</td>
                                 <td>{{ $conyugue->apellido_paterno }}</td>
                              </tr>
                              <tr>
                                 <td>Apellido Materno</td>
                                 <td>{{ $conyugue->apellido_materno }}</td>
                              </tr>
                              <tr>
                                 <td>Dirección</td>
                                 <td>{{ $conyugue->direccion }}</td>
                              </tr>
                           </tbody>
                        </table>
                     @endforeach
                  </div>
               </td>
            </tr>
         </tbody>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Parte III: RELACIONES DE PARENTESCO POR CONSANGUINIDAD</p>
                     <table>
                        <thead>
                           <tr>
                              <th>Nombres</th>
                              <th>Apellido Paterno</th>
                              <th>Apellido Materno</th>
                              <th>Parentesco</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($consaguinidades as $consaguinidad)
                              <tr>
                                 <td>{{ $consaguinidad->nombres }}</td>
                                 <td>{{ $consaguinidad->apellido_paterno }}</td>
                                 <td>{{ $consaguinidad->apellido_materno }}</td>
                                 <td>{{ $consaguinidad->parentesco }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Parte IV: RELACIONES DE PARENTESCO POR AFINIDAD</p>
                     <table>
                        <thead>
                           <tr>
                              <th>Nombres</th>
                              <th>Apellido Paterno</th>
                              <th>Apellido Materno</th>
                              <th>Parentesco</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($afinidades as $afinidad)
                              <tr>
                                 <td>{{ $afinidad->nombres }}</td>
                                 <td>{{ $afinidad->apellido_paterno }}</td>
                                 <td>{{ $afinidad->apellido_materno }}</td>
                                 <td>{{ $afinidad->parentesco }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Parte V: RELACIONES POR ADOPCIÓN</p>
                     <table>
                        <thead>
                           <tr>
                              <th>Nombres</th>
                              <th>Apellido Paterno</th>
                              <th>Apellido Materno</th>
                              <th>Parentesco</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($adopciones as $adopcion)
                              <tr>
                                 <td>{{ $adopcion->nombres }}</td>
                                 <td>{{ $adopcion->apellido_paterno }}</td>
                                 <td>{{ $adopcion->apellido_materno }}</td>
                                 <td>{{ $adopcion->parentesco }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Parte VI: PARIENTES QUE TRABAJAN EN EL MINISTERIO PÚBLICO</p>
                     <table>
                        @if ($si_no)
                           <tbody>
                              <tr>
                                 <td>¿Tiene parientes hasta el 2º grado de afinidad que trabajen en el Ministerio
                                    Público?</td>
                                 <td>{{ $si_no->afinidad == 1 ? 'Si' : 'No' }}</td>
                              </tr>
                              <tr>
                                 <td>¿Tiene parientes hasta el 4º grado de consanguinidad que trabajen en el Ministerio
                                    Público?</td>
                                 <td>{{ $si_no->consaguinidad == 1 ? 'Si' : 'No' }}</td>
                              </tr>
                           </tbody>
                        @endif
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>

         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Detallar los parientes hasta 4° grado de consanguinidad y 2° grado de afinidad
                        que trabajan en el Ministerio Público</p>
                     <table>
                        <thead>
                           <tr>
                              <th>Nombres</th>
                              <th>Apellido Paterno</th>
                              <th>Apellido Materno</th>
                              <th>Parentesco</th>
                              <th>Fiscalía otro</th>
                              <th>Dirección Jefatura Unidad</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($parientes_mp as $pariente)
                              <tr>
                                 <td>{{ $pariente->nombre }}</td>
                                 <td>{{ $pariente->apellido_paterno }}</td>
                                 <td>{{ $pariente->apellido_materno }}</td>
                                 <td>{{ $pariente->parentesco }}</td>
                                 <td>{{ $pariente->fiscalia_otro }}</td>
                                 <td>{{ $pariente->direccion_jefatura_unidad }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="bold">Parte VII: CAUSAL DE INCOMPATIBILIDAD EN EL MINISTERIO PÚBLICO</p>
                     <table>
                        <thead>
                           <th>Incompatibilidad</th>
                           <th>Tipo Actividad</th>
                           <th>R.</th>
                           <th>Descripción</th>
                        </thead>
                        <tbody>
                           @foreach ($tiposCausales as $tipo)
                              <tr>
                                 <td>{{ $tipo->incompatibilidad }}</td>
                                 <td>{{ $tipo->tipo_actividad }}</td>
                                 <td>
                                    @foreach ($causalRespuestas as $causal)
                                       @if ($causal->id_tipo_causal == $tipo->id)
                                          <span>{{ $causal->estado == '1' ? 'Si' : 'No' }}</span>
                                       @endif
                                    @endforeach
                                 </td>
                                 <td>
                                    @foreach ($causalRespuestas as $causal)
                                       @if ($causal->id_tipo_causal == $tipo->id)
                                          <span>{{ $causal->descripcion }}</span>
                                       @endif
                                    @endforeach
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </td>
            </tr>
         </tbody>
         <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque">
                     <p class="italic">"Juro la exactitud y veracidad de los datos declarados en el presente documento a
                        la fecha de su presentación,
                        asimismo autorizo expresamente a los funcionarios del Ministerio Público a verificar la
                        información proporcionada
                        comprometiéndome a presentar la documentación que sustente lo declarado en caso de ser
                        requerido."</p>
                  </div>
               </td>
            </tr>
         </tbody>
         {{-- <tbody class="tb-sup">
            <tr>
               <td>
                  <div class="pr-bloque text-center pr-firma">
                     <p class="bold mt">FIRMA DEL FUNCIONARIO</p>
                     <p id="print-date">{{ date('d/m/Y') }} {{ date('H:i:s') }}</p>
                  </div>
               </td>
            </tr>
         </tbody> --}}
      </table>
   </div>
</body>

</html>
