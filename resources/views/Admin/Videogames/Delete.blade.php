@extends('layouts_Admin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete videogame</h1>
                <form action="/admin/videogames/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="videogameid" id="videogameid" value="{{ $videogame->_id }}">
                    <div class="form-group">
                        <label for="Titulo">Videogame title</label>
                        <input class="form-control" type="text" name="Titulo" id="Titulo" value="{{ $videogame->Titulo }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Desarrollo">Developer</label>
                        <input class="form-control" type="text" name="Desarrollo" id="Desarrollo" value="{{ $videogame->Desarrollo }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Unidades_vendidas">Units sold</>
                        <input class="form-control" type="number" name="Unidades_vendidas" id="Unidades_vendidas" value="{{ $videogame->Unidades_vendidas }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Description</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control" disabled>{{ $videogame->Descripcion }}</textarea>
                    </div>
                    <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
