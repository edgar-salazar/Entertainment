@extends('layouts_Admin.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit videogame</h1>
                <form action="/admin/videogames/edit" method= "POST">
                @csrf
                <input type="hidden" name="videogameid" id="videogameid" value="{{ $videogame->_id }}">
                <div class="form-group">
                        <label for="Titulo">Videogame title</label>
                        <input class="form-control" type="text" name="Titulo" id="Titulo" value="{{ $videogame->Titulo }}">
                    </div>
                    <div class="form-group">
                        <label for="Desarrollo">Developer</label>
                        <input class="form-control" type="text" name="Desarrollo" id="Desarrollo" value="{{ $videogame->Desarrollo }}">
                    </div>
                    <div class="form-group">
                        <label for="Unidades_vendidas">Units sold</>
                        <input class="form-control" type="number" name="Unidades_vendidas" id="Unidades_vendidas" value="{{ $videogame->Unidades_vendidas }}">
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Description</label>
                        <textarea name="Descripcion" id="Descripcion" cols="30" rows="10" class="form-control">{{ $videogame->Descripcion }}</textarea>
                    </div>
                    <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection