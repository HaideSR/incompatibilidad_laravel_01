<div class="form-step card mb d-show">
   <span class="step-init-01 form-stepper-circle text-muted">
      <span>1</span>
   </span>
   <div class="card-body princ-first">
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
         <div class="col-4">Estado Civil</div>
         <div class="col-8 bold">{{$funcionario->estado_civil}}</div>
      </div>
      <div class="row">
         <div class="col-4">Dirección</div>
         <div class="col-8 bold">{{$funcionario->direccion}}</div>
      </div>
      <div class="row">
         <div class="col-4">Celular</div>
         <div class="col-8 bold">{{$funcionario->celular}}</div>
      </div>
      @if($fiscalia)
      <div class="row">
         <div class="col-4">Fiscalia/Otro</div>
         <div class="col-8 bold">{{$fiscalia->denominacion}}</div>
      </div> 
      @endIf
      <!-- .. -->
   </div>
</div>