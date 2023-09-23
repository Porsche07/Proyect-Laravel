@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Detalle del Turno</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>Información del Turno:</h4>
                    <p><strong>Calendario:</strong> {{ $shift->calendar->date }}</p>
                    <p><strong>Hora de Apertura:</strong> {{ $shift->opening_time }}</p>
                    <p><strong>Hora de Cierre:</strong> {{ $shift->closing_time }}</p>
                    <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection