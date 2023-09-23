@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Crear Plato</h2>
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

                    <form method="POST" action="{{ route('dishes.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="cuisine_type">Tipo de Cocina</label>
                            <input type="text" class="form-control @error('cuisine_type') is-invalid @enderror" id="cuisine_type" name="cuisine_type" value="{{ old('cuisine_type') }}" required>
                            @error('cuisine_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dish_type">Tipo de Plato</label>
                            <input type="text" class="form-control @error('dish_type') is-invalid @enderror" id="dish_type" name="dish_type" value="{{ old('dish_type') }}" required>
                            @error('dish_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="menu_id">Menú</label>
                            <select name="menu_id" id="menu_id" class="form-control">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->menu_id }}">{{ $menu->cuisine_type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Categoría</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('dishes.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
