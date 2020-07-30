@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add new videogame</h1>
                <form action="/admin/videogames/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="Titulo">Videogame title</label>
                        <input class="form-control" type="text" name="Titulo" id="Titulo">
                    </div>
                    <div class="form-group">
                        <label for="Desarrollo">Developer</label>
                        <input class="form-control" type="text" name="Desarrollo" id="Desarrollo">
                    </div>
                    <div class="form-group">
                        <label for="Unidades_vendidas">Units sold</label>
                        <input class="form-control" type="text" name="Unidades_vendidas" id="Unidades_vendidas">
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Description</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                </form>
            </div>
        </div>
    </div>
@endsection
