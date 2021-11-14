<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo','Pagina') | Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            /* .prevista{
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            } */

            .prevista{
                overflow: hidden;
                height: 75px;
                text-overflow: ellipsis;
            }
        </style>

    </head>
    <body>
        @yield('contenido')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
