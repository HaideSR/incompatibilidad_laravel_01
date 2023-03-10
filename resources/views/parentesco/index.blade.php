@extends('home')

@section('contenido')
    <div class="card max-800">
        <div class="card-body">
            <a href="{{ route('parentesco.create', 'index') }}" class="btn btn-primary">
                <i class="icon-add"></i>
                <span></span>
            </a>
            <a href="/tipo_parentesco" class="btn btn-primary">Tipo de parentesco</a>
            <a href="/grado_parentesco" class="btn btn-primary">Grado de parentesco</a>
            <div class="box-table-1">
                <table class="table-1">
                    <thead class="thealight">
                        <tr>
                            <th>Parentesco</th>
                            <th>Tipo de parentesco</th>
                            <th>Grado</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($t_parentescos as $parentesco)
                            <tr>

                                <td>{{ $parentesco->parentesco }}</td>
                                <td>{{ $parentesco->tipo_parentesco }}</td>
                                <td>{{ $parentesco->grados }}</td>
                                <td>
                                    <a href="{{ route('parentesco.show', $parentesco->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="icon-remove_red_eye"></i>
                                    </a>
                                    <a href="{{ route('parentesco.edit', $parentesco->id) }}"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="icon-create"></i>
                                    </a>
                                    <form action="{{ route('parentesco.destroy', $parentesco->id) }}" method="POST"
                                        class="inline">
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
