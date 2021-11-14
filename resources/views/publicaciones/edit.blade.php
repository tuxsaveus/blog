@extends('diseños.publico')

@section('contenido')

    <div class="container">
        @include('compartido.alertas')
        <h1 class="text-center py-4">Editar Publicacion</h1>
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('publicaciones.update', $publicacion->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label>Titulo</label>
                    <input class="form-control" type="text" name="titulo" value="{{ old('titulo') ?? $publicacion->titulo }}">
                    @error('titulo')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label>Categoria</label>
                        <input class="form-control" type="number" name="categoria_id" value="{{ old('categoria_id') ?? $publicacion->categoria }}">
                        @error('categoria_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Articulo</label>
                        <textarea class="form-control" name="articulo" id="" cols="30" rows="10">{{ old('articulo') ?? $publicacion->articulo }}</textarea>
                    @error('articulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group form-check">
                        <input type="hidden" value="0" name="activo">
                        <input type="checkbox"
                        class="form-check-input"
                        id="activo"
                        name="activo"
                        value="1"
                        {{ old('activo') ? 'checked' : '' }}
                        {{ $publicacion->activo ? 'checked' : '' }}>
                        <label class="form-check-label" for="activo">Activo</label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                    </div>
                </form>

                <form action="{{ route('publicaciones.destroy', ['id'=>$publicacion->id]) }}" method="post">
                    <div class="form-group">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
