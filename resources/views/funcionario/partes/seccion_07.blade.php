<section id="sec-7" data-empty="{{$tiposCausales->isEmpty() ? 'true':''}}"  class="form-step">
   <div class="accordion-body">
      <table class="table table-ligth">
         <thead class="thealight">
            <tr>
               <th>Incompatibilidad</th>
               <th>Tipo de Actividad</th>
               <th>Resp.</th>
               <th>Descripcion</th>
               <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            @foreach($tiposCausales as $tipo)
               <tr>
                  <td>{{$tipo->incompatibilidad}}</td>
                  <td>{{$tipo->tipo_actividad}}</td>
                  <td>
                     @foreach($causalRespuestas as $causal)
                        @if($causal->id_tipo_causal == $tipo->id)
                           <span>{{$causal->estado == '1' ? 'Si':'No'}}</span>
                        @endif
                     @endforeach
                  </td>
                  <td>
                     @foreach($causalRespuestas as $causal)
                        @if($causal->id_tipo_causal == $tipo->id)
                           <span>{{$causal->descripcion}}</span>
                        @endif
                     @endforeach
                  </td>
                  <td>
                     @if($causalRespuestas->contains('id_tipo_causal', $tipo->id))
                        @foreach($causalRespuestas as $causal)
                           @if($causal->id_tipo_causal == $tipo->id)
                              <a href="{{ route('causal.edit', $causal->id) .'?idF='.request()->funcionario }}" class="btn btn-sm btn-outline-info">
                                 <i class="icon-create"></i>
                              </a>
                           @endif
                        @endforeach
                        {{--  --}}
                     @else
                        <a href="{{ route('causal.create', 'idTipoCausal='.$tipo->id.'&idF='.request()->funcionario) }}" class="btn btn-sm btn-outline-info">
                           <i class="icon-create"></i>
                        </a>
                     @endif
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</section>