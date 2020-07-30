@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add new movie</h1>
                <form action="/admin/movies/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Titulo">Movie title</label>
                        <input class="form-control" type="text" name="Titulo" id="Titulo">
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Director</label>
                        <input class="form-control" type="text" name="Direccion" id="Direccion">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Duracion_min">Minutes of duration</label>
                            <input class="form-control" type="number" name="Duracion_min" id="Duracion_min">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Pais">Country</label>
                            <input class="form-control" type="text" name="Pais" id="Pais">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Description</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <a href="/admin/movies/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                </form>
            </div>
        </div>
    </div>
@endsection
