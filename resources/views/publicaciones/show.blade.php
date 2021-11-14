@extends('diseños.publico')

@section('titulo', 'Publicacion')

@section('contenido')

    <div class="container">
    <h1 class="text-center py-4">{{ $publicacion->titulo }}</h1>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card py-4 my-4">
                    <div class="card-body">
                        <p class="card-text">{{ $publicacion->articulo }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
