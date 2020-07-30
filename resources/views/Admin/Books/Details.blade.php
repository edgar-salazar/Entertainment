@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Book details</h1>
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><b>{{ $book->Titulo}}</b></h2>
                        <h4 class="card-subtitle mb-2 text-muted"><b>{{ $book->Autor }}</b></h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $book->NumPaginas }} pages</li>
                        <li class="list-group-item"><b>Country: </b> {{ $book->Pais }}</li>
                        <li class="list-group-item"><b>Description: </b> {{ $book->Descripcion }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/books/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                        <a href="/admin/books/edit/{{ $book->_id }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/books/delete/{{ $book->_id }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
