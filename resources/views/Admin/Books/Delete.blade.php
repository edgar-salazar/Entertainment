@extends('layouts_Admin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete book</h1>
                <form action="/admin/books/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="bookid" id="bookid" value="{{ $book->_id }}">
                    <div class="form-group">
                        <label for="Titulo">Book title</label>
                        <input class="form-control" type="text" name="Titulo" id="Titulo" value="{{ $book->Titulo }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Autor">Author</label>
                        <input class="form-control" type="text" name="Autor" id="Autor" value="{{ $book->Autor }}" disabled>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="NumPaginas">Page Count</label>
                            <input class="form-control" type="number" name="NumPaginas" id="NumPaginas" value="{{ $book->NumPaginas }}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Pais">Country</label>
                            <input class="form-control" type="text" name="Pais" id="Pais" value="{{ $book->Pais }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Description</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control" disabled>{{ $book->Descripcion }}</textarea>
                    </div>
                    <a href="/admin/books/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
