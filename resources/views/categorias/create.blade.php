@extends('diseños.publico')
@section('contenido')
    <div class="container">
        @include('compartido.alertas')
        <h1 class="text-center py-4">Todas las categorias</h1>
        <form action="{{ route('categorias.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
              @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <textarea type="text" class="form-control" name="descripcion">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>
    </div>
@endsection
