
<section id="sec-6" data-empty="{{!$si_no ? 'true':''}}" class="form-step">
   <div class="accordion-body">
      <table class="table table-ligth">
         <thead class="thealight">
            <tr>
               <th></th>
               <th>Respuesta</th>
               <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>¿Tiene parientes hasta el 2º grado de afinidad que trabajen en el Ministerio Público?</td>
               <td>
                  @if( !$si_no )
                     <span>-</span>
                  @else
                     <span>
                        {{$si_no->afinidad == 1 ? 'Si' : 'No'}}
                     </span>
                  @endif
               </td>
               <td rowspan="2">
                  @if(!$si_no)
                     <a href="/si_no?&idF={{request()->funcionario}}">
                        Marcar
                     </a>
                  @else
                     <a href="/si_no?&idResp={{$si_no->id}}&idF={{request()->funcionario}}">
                        Editar
                     </a>
                  @endif
               </td>
            </tr>
            <tr>
               <td>¿Tiene parientes hasta el 4º grado de consanguinidad que trabajen en el Ministerio Público?</td>
               <td>
                  @if( !$si_no )
                     <span>-</span>
                  @else
                     <span>{{$si_no->consaguinidad == 1 ? 'Si' : 'No'}}</span>
                  @endif
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</section>