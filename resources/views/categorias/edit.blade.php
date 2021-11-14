@extends('diseños.publico')
@section('contenido')
    <div class="container">
        @include('compartido.alertas')
        <h1 class="text-center py-4">Editar categoria</h1>
        <form action="{{ route('categorias.update', $categoria->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{ old('nombre') ?? $categoria->nombre }}">
              @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <textarea type="text" class="form-control" name="descripcion">{{ old('descripcion') ?? $categoria->descripcion }}</textarea>
                @error('descripcion')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
          <form action="{{ route('categorias.destroy', ['categoria'=>$categoria->id]) }}" method="post">
            <div class="form-group mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-lg">Eliminar</button>
            </div>
        </form>
    </div>
@endsection
