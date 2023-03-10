@extends('home')

@section('contenido')
    <div class="card max-1000">
        <div class="card-body">
            <a href="{{ route('cargos.create', 'index') }}" class="btn btn-primary">
                <i class="icon-add"></i>
                <span></span>
            </a>
            <div class="box-table-1">
                <table class="table-1">
                    <thead class="thealight">
                        <tr>
                            <th>#</th>
                            <th>Nombre del cargo</th>
                            <th class="col-max-80">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $cargo->nombre }}</td>
                                <td>
                                    <a href="{{ route('cargos.edit', $cargo->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="icon-create"></i>
                                    </a>
                                    <form action="{{ route('cargos.destroy', $cargo->id) }}" method="POST" class="inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar?')"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="icon-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
