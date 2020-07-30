@extends('layouts_Admin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete serie</h1>
                <form action="/admin/series/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="serieid" id="serieid" value="{{ $serie->_id }}">
                    <div class="form-group">
                        <label for="Titulo">Serie title</label>
                        <input class="form-control" type="text" name="Titulo" id="Titulo" value="{{ $serie->Titulo }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Creacion">Creator</label>
                        <input class="form-control" type="text" name="Creacion" id="Creacion" value="{{ $serie->Creacion }}" disabled>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Num_Temporadas">Seasons</label>
                            <input class="form-control" type="number" name="Num_Temporadas" id="Num_Temporadas" value="{{ $serie->Num_Temporadas }}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Pais">Country</label>
                            <input class="form-control" type="text" name="Pais" id="Pais" value="{{ $serie->Pais }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Description</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control" disabled>{{ $serie->Descripcion }}</textarea>
                    </div>
                    <a href="/admin/series/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
