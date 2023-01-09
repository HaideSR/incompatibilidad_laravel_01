<div class="card mb p">
   <div class="card-body ">
      <div class="row">
         <div class="col-4">Cédula de indentidad</div>
         <div class="col-8 bold">{{$funcionario->numero_ci}}</div>
      </div>
      <div class="row">
         <div class="col-4">Complemento</div>
         <div class="col-8 bold">{{$funcionario->complemento}}</div>
      </div>
      <div class="row">
         <div class="col-4">Expedido</div>
         <div class="col-8 bold">{{$funcionario->expedido}}</div>
      </div>
      <div class="row">
         <div class="col-4">Nombres</div>
         <div class="col-8 bold">{{$funcionario->nombres}}</div>
      </div>
      <div class="row">
         <div class="col-4">Apellido paterno</div>
         <div class="col-8 bold">{{$funcionario->apellido_paterno}}</div>
      </div>
      <div class="row">
         <div class="col-4">Apellido Materno</div>
         <div class="col-8 bold">{{$funcionario->apellido_materno}}</div>
      </div>
      <div class="row">
         <div class="col-4">Fecha de nacimiento</div>
         <div class="col-8 bold">{{$funcionario->fecha_nacimiento}}</div>
      </div>
      <div class="row">
         <div class="col-4">Dirección</div>
         <div class="col-8 bold">{{$funcionario->direccion}}</div>
      </div>
      <div class="row">
         <div class="col-4">Celular</div>
         <div class="col-8 bold">{{$funcionario->celular}}</div>
      </div>
      <div class="row">
         <div class="col-4">Fiscalia/Otro</div>
         <div class="col-8 bold">{{$fiscalia->denominacion}}</div>
      </div> 
      <!-- .. -->
   </div>
</div>