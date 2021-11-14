@extends('diseños.publico')
@section('contenido')
    <div class="container">
        @include('compartido.alertas')
        <h1 class="text-center py-4">Crear categoria</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <th scope="row">{{ $categoria->id }}</th>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion ?? 'No hay descripcion' }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
