@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Movie details</h1>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><b>{{ $movie->Titulo}}</b></h2>
                        <h4 class="card-subtitle mb-2 text-muted"><b>{{ $movie->Direccion }}</b></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $movie->Duracion_min }} min</li>
                        <li class="list-group-item"><b>Country: </b> {{ $movie->Pais }}</li>
                        <li class="list-group-item"><b>Description: </b> {{ $movie->Descripcion }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/movies/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                        <a href="/admin/movies/edit/{{ $movie->_id }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/movies/delete/{{ $movie->_id }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
