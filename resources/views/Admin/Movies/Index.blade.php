@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Movies</h1>
                <a class="text-right" href="/admin/movies/create">Add new movie</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Director</th>
                        <th scope="col">min</th>
                        <th scope="col">Country</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td>{{ $movie->Titulo}}</td>
                            <td>{{ $movie->Direccion}}</td>
                            <td>{{ $movie->Duracion_min}}</td>
                            <td>{{ $movie->Pais}}</td>
                            <td>
                                <a href="/admin/movies/{{ $movie->_id }}">Details</a> |
                                <a href="/admin/movies/edit/{{ $movie->_id }}">Edit</a> |
                                <a href="/admin/movies/delete/{{ $movie->_id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection