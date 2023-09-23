@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Detalles del Evento de Calendario</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><strong>Fecha:</strong> {{ $calendar->date }}</p>
                    <p><strong>Estado:</strong> {{ $calendar->status }}</p>
                    <a href="{{ route('calendar.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
