@extends('diseños.publico')

@section('titulo', 'Crear Publicacion')

@section('contenido')

    <div class="container">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <h1 class="text-center py-4">Crear Publicacion</h1>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('publicaciones.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Titulo</label>
                            <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" type="text" name="titulo" value="{{ old('titulo') }}">
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control {{ $errors->has('categoria_id') ? 'is-invalid' : '' }}" name="categoria_id" >
                            <option value="" selected disabled>Selecciona una Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Articulo</label>
                    <textarea class="form-control {{ $errors->has('articulo') ? 'is-invalid' : '' }}" name="articulo" id="" cols="30" rows="10">{{ old('articulo') }}</textarea>
                    @error('articulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" {{ old('activo') ? 'checked' : '' }}>
                        <label class="form-check-label" for="activo">Activo</label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
