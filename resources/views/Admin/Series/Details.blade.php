@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Serie details</h1>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><b>{{ $serie->Titulo}}</b></h2>
                        <h4 class="card-subtitle mb-2 text-muted"><b>{{ $serie->Creacion }}</b></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Seasons: </b>{{ $serie->Num_Temporadas }}</li>
                        <li class="list-group-item"><b>Country: </b> {{ $serie->Pais }}</li>
                        <li class="list-group-item"><b>Description: </b> {{ $serie->Descripcion }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/series/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                        <a href="/admin/series/edit/{{ $serie->_id }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/series/delete/{{ $serie->_id }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
