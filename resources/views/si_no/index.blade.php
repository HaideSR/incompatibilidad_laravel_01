@extends('home')

@section('contenido')
<div class="card">
   <div class="card-body">
      <form action="{{ request()->query('idResp') ? route('si_no.update', request()->query('idResp')) : '/si_no' }}" method="POST">
         @csrf
         {{ request()->query('idResp') ? method_field('PUT') : ''}}
         <input type="hidden" value="{{request()->query('idF')}}" name="id_funcionario">
         <table class="table table-ligth">
            <thead class="thealight">
               <tr>
                  <th>
                     <div>
                        <small>Marcar para check, para afirmar la pregunta</small>
                     </div>
                  </th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>¿Tiene parientes hasta el 2º grado de afinidad que trabajen en el Ministerio Público?</td>
                  <td>
                     <div class="form-check form-check-inline">
                        <input name="afinidad" type="radio" id="i-s01" value="1" @checked( $sino && $sino->afinidad == 1 ) class="form-check-input">
                        <label class="form-check-label" for="i-s01">Si</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input name="afinidad" type="radio" id="i-s02" value="0" @checked( $sino && $sino->afinidad == 0 ) class="form-check-input">
                        <label class="form-check-label" for="i-s02">No</label>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>¿Tiene parientes hasta el 4º grado de consanguinidad que trabajen en el Ministerio Público?</td>
                  <td>
                     <div class="form-check form-check-inline">
                        <input name="consaguinidad" type="radio" id="i-a01" value="1" @checked( $sino && $sino->consaguinidad == 1 ) class="form-check-input">
                        <label class="form-check-label" for="i-a01">Si</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input name="consaguinidad" type="radio" id="i-a02" value="0" @checked( $sino && $sino->consaguinidad == 0 ) class="form-check-input">
                        <label class="form-check-label" for="i-a02">No</label>
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
         <div class="d-flex justify-content-around">
            <a href="/funcionario/{{request()->query('idF')}}" class="btn btn-light">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
      </form>
   </div>
</div>
@stop
