@extends('home')

@section('contenido')
<div class="card max-800">
  <div class="card-body">
     <h4 class="text-center title-frm">Agregar Parentesco</h4>
      <form action="{{'/parentesco'}}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
       @csrf
        <div class="col-md-4">
          <label for="f1" class="form-label">Tipo de Parentesco</label>
            <select name="id_tipoParentesco" class="form-control" id="f1" required>
          <option value="">--Elejir Tipo de Parentesco</option>
             @foreach($Tipo_parentescos as $Tipo_parentesco)
          <option value="{{$Tipo_parentesco['id']}}">{{$Tipo_parentesco['tipo_parentesco']}}</option>
             @endforeach
            </select>
      </div>
  
      <div class="col-md-4">
      <label for="f2" class="form-label">Parentesco:</label>
      <input type="text" name='parentesco' class="form-control" id="f2" required>
       </div>

      <div class="col-md-4">
        <label for="f3" class="form-label">Grado:</label>
        <select name="id_grado" class="form-control" id="f3" required>
          <option value="">-- Elejir Grado</option>
             @foreach($Grados as $Grado)
             <option value="{{$Grado['id']}}">{{$Grado['grados']}}</option>
             @endforeach
        </select>
      </div>
      <div class="d-flex justify-content-around bx--btns">
       <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
       <button class="btn btn-primary" type="submit">Registrar </button>
      </div> 
    </form>
  </div>
</div>
@stop