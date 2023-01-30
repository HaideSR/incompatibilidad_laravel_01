@extends('home')

@section('contenido')
<div class="card max-800">
  <div class="card-body">
     <h4 class="text-center title-frm">Agregar Documento</h4>
      <form action="{{'/subir_declaracion'}}" method="post"  accept-charset="UTF-8"  enctype="multipart/form-data" class="row g-3 form-register">
       @csrf
        <div class="col-md-4">
          <label for="f1" class="form-label">Cedula Identidad</label>
            <input type="text" value="{{$funcionario->numero_ci}}" class="form-control" id="f1" required>
            {{-- <select name="id_funcionario">
          <option value="">          </option>
             @foreach($funcionarios as $numero_ci)
          <option value="{{$numero_ci['id']}}">{{$numero_ci['numero_ci']}}</option>
             @endforeach
            </select> --}}
      </div> 
      <div class="col-md-4">
        <label for="f4" class="form-label">Motivo:</label>
        <select name="id_motivodeclaracion" class="form-control" id="f4" required>
          <option value="">--selecciona motivo--</option>
             @foreach($motivos as $motivo)
             <option value="{{$motivo['id']}}">{{$motivo['motivo']}}</option>
             @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label for="f5" class="form-label">Archivo:</label>
        <input type="file" name='archivo' accept=".pdf" class="form-control" id="f5" required>
      </div>
     
      <div class="d-flex justify-content-around bx--btns">
       <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
       <button class="btn btn-primary" type="submit">Registrar </button>
      </div> 
    </form>
  </div>
</div>
@stop