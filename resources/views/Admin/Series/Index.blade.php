@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Series</h1>
                <a class="text-right" href="/admin/series/create">Add new serie</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Seasons</th>
                        <th scope="col">Country</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($series as $movie)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td>{{ $movie->Titulo}}</td>
                            <td>{{ $movie->Creacion}}</td>
                            <td>{{ $movie->Num_Temporadas}}</td>
                            <td>{{ $movie->Pais}}</td>
                            <td>
                                <a href="/admin/series/{{ $movie->_id }}">Details</a> |
                                <a href="/admin/series/edit/{{ $movie->_id }}">Edit</a> |
                                <a href="/admin/series/delete/{{ $movie->_id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection