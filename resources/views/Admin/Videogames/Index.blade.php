@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Videogames</h1>
                <a class="text-right" href="/admin/videogames/create">Add new videogame</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Developer</th>
                        <th scope="col">Units sold</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videogames as $videogame)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td>{{ $videogame->Titulo}}</td>
                            <td>{{ $videogame->Desarrollo}}</td>
                            <td>{{ $videogame->Unidades_vendidas}}</td>
                            <td>
                                <a href="/admin/videogames/{{ $videogame->_id }}">Details</a> |
                                <a href="/admin/videogames/edit/{{ $videogame->_id }}">Edit</a> |
                                <a href="/admin/videogames/delete/{{ $videogame->_id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection