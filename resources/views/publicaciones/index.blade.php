@extends('diseños.publico')

@section('titulo', 'Publicaciones')

@section('contenido')

    <div class="container">
        @include('compartido.alertas')
        @if ($flash = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Grandioso!</strong> {{ $flash }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h1 class="text-center py-4">Publicaciones</h1>
        <div class="row justify-content-center">
            <div class="col-12">
                @foreach ($publicaciones as $publicacion)
                <div class="card py-4 my-4">
                    <div class="card-body">
                        <a href="{{ route('publicaciones.show', $publicacion->id) }}">
                        <h2 class="card-title">{{ $publicacion->titulo }}</h2>
                        </a>
                        <a href="{{ route('publicaciones.categoria', $publicacion->categoria->id) }}"><span class="badge badge-primary">{{ $publicacion->categoria->nombre }}</span></a>
                        <p class="card-text prevista">{{ $publicacion->articulo }}</p><a href="{{ route('publicaciones.show', $publicacion->id) }}">Leer mas →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
