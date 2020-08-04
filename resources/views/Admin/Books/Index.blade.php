@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Books</h1>
                <a class="text-right" href="/admin/books/create">Add new book</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="color: black;">#</th>
                        <th scope="col" style="color: black;">Title</th>
                        <th scope="col" style="color: black;">Author</th>
                        <th scope="col" style="color: black;">Page Count</th>
                        <th scope="col" style="color: black;">Country</th>
                        <th scope="col" style="color: black;">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td>{{ $book->Titulo}}</td>
                            <td>{{ $book->Autor}}</td>
                            <td>{{ $book->NumPaginas}}</td>
                            <td>{{ $book->Pais}}</td>
                            <td>
                                <a href="/admin/books/{{ $book->_id }}">Details</a> |
                                <a href="/admin/books/edit/{{ $book->_id }}">Edit</a> |
                                <a href="/admin/books/delete/{{ $book->_id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection