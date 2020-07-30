@extends('layouts_Admin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit movie</h1>
                <form action="/admin/movies/edit" method= "POST">
                @csrf
                <input type="hidden" name="movieid" id="movieid" value="{{ $movie->_id }}">
                <div class="form-group">
                        <label for="Titulo">Movie title</label>
                        <input class="form-control" type="text" name="Titulo" id="Titulo" value="{{ $movie->Titulo }}">
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Director</label>
                        <input class="form-control" type="text" name="Direccion" id="Direccion" value="{{ $movie->Direccion }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Duracion_min">Minutes of duration</label>
                            <input class="form-control" type="number" name="Duracion_min" id="Duracion_min" value="{{ $movie->Duracion_min }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Pais">Country</label>
                            <input class="form-control" type="text" name="Pais" id="Pais" value="{{ $movie->Pais }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Description</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control">{{ $movie->Descripcion }}</textarea>
                    </div>
                    <a href="/admin/movies/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection