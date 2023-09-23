@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Editar Turno</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('shifts.update', $shift->shift_id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="calendar_id">Calendario</label>
                            <select name="calendar_id" id="calendar_id" class="form-control">
                                @foreach ($calendars as $calendar)
                                    <option value="{{ $calendar->calendar_id }}" {{ $calendar->calendar_id === $shift->calendar_id ? 'selected' : '' }}>{{ $calendar->date }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="opening_time">Hora de Apertura</label>
                            <input type="time" class="form-control @error('opening_time') is-invalid @enderror" id="opening_time" name="opening_time" value="{{ old('opening_time', $shift->opening_time) }}" required>
                            @error('opening_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="closing_time">Hora de Cierre</label>
                            <input type="time" class="form-control @error('closing_time') is-invalid @enderror" id="closing_time" name="closing_time" value="{{ old('closing_time', $shift->closing_time) }}" required>
                            @error('closing_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection