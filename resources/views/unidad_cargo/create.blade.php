@extends('home')

@section('contenido')

<div class="card max-800">
    <div class="card-body">
       <h4 class="text-center title-frm">Agregar Unidad/Cargo</h4>
    <form action="{{'/unidad_cargo'}}" method="post" enctype="multipart/form-data" class="row g-3 form-register">

    @csrf
    <div class="col-md-4">
    <label for="f1" class="form-label">Unidad:</label>
    <input type="text" name='unidad' class="form-control" id="f1">
    </div>
    <div class="col-md-4">
    <label for="f2" class="form-label">Cargo:</label>
    <input type="text" name='cargo' class="form-control" id="f2">
    </div>
    <div class="col-md-4">
        <label for="f3" class="form-label">Fiscalias/otro</label>
        <select name="id_fiscalia" id="inputFiscalia_id" class="form-control" id="f3" >
            <option value="">-- Elejir Fiscalia</option>
               @foreach($fiscalias as $fiscalia)
               <option value="{{$fiscalia['id']}}">{{$fiscalia['denominacion']}}</option>
               @endforeach
        </select>
    </div>
    <div class="d-flex justify-content-around bx--btns">
        <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
        <button class="btn btn-primary" type="submit">Registrar </button>
     </div> 
</form>
@stop