@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Eventos de Calendario</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <a href="{{ route('calendar.create') }}" class="btn btn-primary">Agregar Evento</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calendars as $calendar)
                        <tr>
                            <td>{{ $calendar->date }}</td>
                            <td>{{ $calendar->status }}</td>
                            <td>
                                <a href="{{ route('calendar.show', $calendar->calendar_id) }}" class="btn btn-primary">Ver</a>
                                <a href="{{ route('calendar.edit', $calendar->calendar_id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('calendar.destroy', $calendar->calendar_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este evento de calendario?')">Eliminar</button>
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
