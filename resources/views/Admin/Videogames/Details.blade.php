@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Videogame details</h1>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><b>{{ $videogame->Titulo}}</b></h2>
                        <h4 class="card-subtitle mb-2 text-muted"><b>{{ $videogame->Desarrollo }}</b></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $videogame->Unidades_vendidas }} pages</li>
                        <li class="list-group-item"><b>Description: </b> {{ $videogame->Descripcion }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                        <a href="/admin/videogames/edit/{{ $videogame->_id }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/videogames/delete/{{ $videogame->_id }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
