{{-- <div class="accordion-item">
    <h2 class="accordion-header" id="heading-{{$nro}}">
       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$nro}}" aria-expanded="false" aria-controls="collapse-{{$nro}}">
          <b class="ml">Detallar parientes hasta el 4º grado de Consanguinidad y 2º grado de afinidad que trabajan en el Ministerio Públicio</b>
       </button>
    </h2>
    <div id="collapse-{{$nro}}" class="accordion-collapse collapse" aria-labelledby="heading-{{$nro}}" data-bs-parent="#accordionExample">
       
    </div>
 </div> --}}
 
<section class="form-step">
   <div class="accordion-body">
      <table class="table table-ligth">
         <thead class="thealight">
               <tr> 
                  <th>Nombres</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Parentesco</th>
                  <th>Fiscalia Perteneciente</th>
                  <th>Unidad</th>
                  <th>Acciones</th>
               </tr>
         </thead>
         <tbody>
               @foreach($parientes_mp as $persona)
               <tr>
                  <td>{{$persona->nombre}}</td>
                  <td>{{$persona->apellido_paterno}}</td>
                  <td>{{$persona->apellido_materno}}</td>
                  <td>{{$persona->parentesco}}</td>
                  <td>{{$persona->fiscalia_otro}}</td>
                  <td>{{$persona->direccion_jefatura_unidad}}</td>
                  {{--<td>{{$persona->nombres}}</td>--}}
                  <td> 
                     @if($errors->any())
                     <p class="error-message">{{$errors->first('mensaje')}}</p>
                     @endif
                     
                     <a href="{{ route('parientes_mp.edit', $persona->id) }}" class="btn btn-sm btn-outline-info">
                        <i class="icon-create"></i> 
                     </a>
                     <form action="{{ route('parientes_mp.destroy', $persona->id) }}" method="POST" class="inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar?')" class="btn btn-sm btn-outline-danger">
                           <i class="icon-delete"></i>
                        </button>
                     </form>
                     
                  </td>
               </tr>
               @endforeach
         </tbody>
      
      </table>
         <a href="/parientes_mp/create?&idF={{request()->funcionario}}&sino={{$si_no->id}}" class="btn   btn-outline-primary">
            <i class="icon-add_circle"></i>
            <span>Agregar Parientes</span>
         </a>
   </div>
</section>