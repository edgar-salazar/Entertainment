@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Videogames</h1>
                <div class="row">
                        @foreach($videogames as $videogame)
                            <div class="card col-md-3">
                                <img src="" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $videogame->Titulo }}</h3>
                                    <h5 class="card-text">{{ $videogame->Desarrollo }}</h5>
                                    <p class="card-text">{{ $videogame->Unidades_vendidas }} of units sold</p>
                                    <a href="/videogames/{{ $videogame->_id }}" class="btn btn-info">View</a>
                                </div>
                            </div>
                        @endforeach
                    <div class="col-md-12 ">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mx-auto" role="group" aria-label="First group">
                                @php 
                                    $cpage = request('pg') == 0 ? 1 : request('pg');
                                @endphp    
                                    <a href ="/videogames?pg={{ $cpage - 1 }}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                @for ($i = 1; $i <= ceil($videogameCount/12); $i++)
                                    <a href="/videogames?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : ''}}">{{$i}}</a>
                                @endfor
                                    <a href="/videogames?pg={{ $cpage + 1}}" class="btn btn-secondary {{$cpage == ceil($videogameCount/12) ? 'disabled' : '' }}">&gt</a>
                                </div>
                          </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
