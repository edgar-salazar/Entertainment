@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Books</h1>
                    @foreach($books as $book)
                        <div class="card mb-2" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <img src="..." class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $book->Titulo }}</h3>
                                        <h5 class="card-text">{{ $book->Autor }}</h5>
                                        <p class="card-text">{{ $book->NumPaginas }} paginas</p>
                                        <a href="/books/{{ $book->_id }}" class="btn btn-info">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="col-md-12 ">
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mx-auto" role="group" aria-label="First group">
                                    @php 
                                        $cpage = request('pg') == 0 ? 1 : request('pg');
                                    @endphp    
                                        <a href ="/books?pg={{ $cpage - 1 }}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                    @for ($i = 1; $i <= ceil($bookCount/12); $i++)
                                        <a href="/books?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : ''}}">{{$i}}</a>
                                    @endfor
                                        <a href="/books?pg={{ $cpage + 1}}" class="btn btn-secondary {{$cpage == ceil($bookCount/12) ? 'disabled' : '' }}">&gt</a>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
