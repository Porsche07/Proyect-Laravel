@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Lista de Turnos</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('shifts.create') }}" class="btn btn-primary mb-3">Agregar Turno</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Calendar ID</th>
                        <th>Hora de Apertura</th>
                        <th>Hora de Cierre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shifts as $shift)
                    <tr>
                        <td>{{ $shift->shift_id }}</td>
                        <td>{{ $shift->calendar_id }}</td>
                        <td>{{ $shift->opening_time }}</td>
                        <td>{{ $shift->closing_time }}</td>
                        <td>
                            <a href="{{ route('shifts.show', $shift->shift_id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('shifts.edit', $shift->shift_id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('shifts.destroy', $shift->shift_id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este turno?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection