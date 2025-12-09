<div class="d-flex justify-content-between mb-3">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h2>Listado de Personajes</h2>
    <a href="{{ route('personajes.create') }}" class="btn btn-primary">Nuevo Personaje</a>
</div>

<form action="{{ route('personajes.index') }}" method="GET" class="mb-3 d-flex gap-2">
    <label for="nivel" class="form-label me-2">Filtrar por nivel:</label>
    <input type="number" name="nivel" id="nivel" value="{{ $nivel ?? '' }}" class="form-control w-auto">
    <button type="submit" class="btn btn-secondary ms-2">Filtrar</button>
    <a href="{{ route('personajes.index') }}" class="btn btn-outline-secondary ms-2">Quitar filtro</a>
</form>

@if($personajes->isEmpty())
    <div class="alert alert-info">No hay personajes registrados.</div>
@else

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Monedas</th>
            <th>Fecha creación</th>
            <th>Estadisticas</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($personajes as $personaje)
        <tr>
            <td>{{ $personaje->_id }}</td>
            <td>{{ $personaje->name }}</td>
            <td>{{ $personaje->level }}</td>
            <td>{{ $personaje->coins }}</td>
            <td>{{ $personaje->created_at }}</td>
            <td><pre>{{ json_encode($personaje->stats, JSON_PRETTY_PRINT) }}</pre></td>

            <td>
                <a href="{{ route('personajes.show', $personaje->_id) }}" class="btn btn-sm btn-info">Ver</a>

                <a href="{{ route('personajes.edit', $personaje->_id) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('personajes.destroy', $personaje->_id) }}"
                      method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('¿Deseas eliminar este personaje?')">
                        Eliminar
                    </button>
                </form>
                    {{-- Botón +10 monedas --}}
                <form action="{{ route('personajes.updateCoins', $personaje->_id) }}"
                    method="POST" style="display:inline-block; margin-left: 4px;">
                    @csrf
                    <input type="hidden" name="change" value="10">
                    <button class="btn btn-sm btn-success">+10</button>
                </form>

                {{-- Botón -10 monedas --}}
                <form action="{{ route('personajes.updateCoins', $personaje->_id) }}"
                    method="POST" style="display:inline-block; margin-left: 4px;">
                    @csrf
                    <input type="hidden" name="change" value="-10">
                    <button class="btn btn-sm btn-outline-danger">-10</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@endif
