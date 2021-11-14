@if ($flash = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Grandioso!</strong> {{ $flash }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
