{{-- <div class="accordion-item">
   <h2 class="accordion-header" id="heading-{{ $nro }}">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
         data-bs-target="#collapse-{{ $nro }}" aria-expanded="false" aria-controls="collapse-{{ $nro }}">
         <span>Parte {{ $nro }}: </span>
         <b class="ml">Parientes que trabajan en el Ministerio Público</b>
      </button>
   </h2>
   <div id="collapse-{{ $nro }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $nro }}"
      data-bs-parent="#accordionExample">
      
   </div>
</div> --}}

<section class="form-step">
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