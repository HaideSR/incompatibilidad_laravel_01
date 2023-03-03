@extends('home')

@section('contenido')
   <div class="card max-800">
      <div class="card-body">
         <h4 class="text-center title-frm">Agregar Usuario</h4>
         {{-- {{$usuario}} --}}
         <form action="{{ '/usuarios' }}" method="post" enctype="multipart/form-data" class="row g-3 form-register">
            @csrf
            <div class="col-md-4">
               <label for="f1" class="form-label">Cédula Identidad</label>
               <input type="text" value="{{$usuario->numero_ci}}" name="numero_ci" class="form-control" id="f1" disabled>
            </div>
            <div class="col-md-4">
               <label for="f4" class="form-label">Apellido paterno</label>
               <input type="text" value="{{$usuario->apellido_paterno}}" name="apellido_paterno" class="form-control" id="f4" disabled>
            </div>
            <div class="col-md-4">
               <label for="f5" class="form-label">Apellido materno</label>
               <input type="text" value="{{$usuario->apellido_materno}}" name="apellido_materno" class="form-control" id="f5" disabled>
            </div>
            <div class="col-md-8">
               <label for="f6" class="form-label">Nombres</label>
               <input type="text" value="{{$usuario->nombres}}" name="nombres" class="form-control" id="f6" disabled>
            </div>
            <div class="col-md-6">
               <label for="f6" class="form-label">Correo</label>
               <input type="email" value="{{$usuario->email}}" name="email" class="form-control" id="f6" disabled>
            </div>
            <hr>
            
            <div class="col-md-6">
               <label for="f6" class="form-label">Estado</label>
               {{-- <input type="text" name="password" class="form-control" id="f6" required> --}}
               <select name="estado" class="form-control" id="ff9">
                  <option @selected( $usuario->estado == 1) value="1">Activo</option>
                  <option @selected( $usuario->estado == 0) value="0">Suspendido</option>
               </select>
            </div>
            <div class="col-md-6">
               <label for="f9" class="form-label">Rol</label>
               <select name="nivel" class="form-control" id="f9">
                  <option @selected( $usuario->nivel == 'ADMIN') value="ADMIN">Administrador</option>
                  <option @selected( $usuario->nivel == 'FUNCIONARIO') value="FUNCIONARIO">Funcionario</option>
               </select>
            </div>
            <div class="col-md-8">
               <label for="f6" class="form-label">Asignar nueva Contraseña  <small>(Llenar este campo solo si desea cambiar)</small> </label>
               <input type="text" name="password" class="form-control" id="f6">
            </div>
            <div class="mb">
               @error('numero_ci')
                  <span class="invalid-feedback block" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
               @enderror
               @error('email')
                  <span class="invalid-feedback block" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
               @enderror
               @error('password')
                  <span class="invalid-feedback block" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
               @enderror
            </div>
            <div class="d-flex justify-content-around bx--btns">
               <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>
               <button class="btn btn-primary" type="submit">Registrar </button>
            </div>
         </form>
      </div>
   </div>
@stop
