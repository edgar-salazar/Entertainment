<?php

use Illuminate\Support\Facades\Route;

//USER

Route::get('/', function () {
    return view('welcome');
});

//ADMIN

Route::get('/admin/', function () {
    return view('welcome_Admin');
});

//BookStore

Route::get('/books', 'BookController@bookStore')->name('BookStore');

Route::get('/books/{id}', 'BookController@Details')->name('BookDetails');

Route::post('/books/comment', 'BookController@AddComment')->name('BooksComments');

Route::get('/mongodb', function () {
    return view('mongodb');
});

/*ADMIN
BookStore*/

Route::get('/admin/books', 'BookController@Index');

Route::get('/admin/books/create', "BookController@Create");

Route::post('/admin/books/create', "BookController@Store");

Route::get('/admin/books/{id}', "BookController@Show");

Route::get('/admin/books/edit/{id}', "BookController@Edit");

Route::post('/admin/books/edit', "BookController@Update");

Route::get('/admin/books/delete/{id}', "BookController@Delete");

Route::delete('/admin/books/delete', "BookController@Remove");

//MovieStore

Route::get('/movies', 'MovieController@movieStore')->name('MovieStore');

Route::get('/movies/{id}', 'MovieController@Details')->name('MovieDetails');

Route::post('/movies/comment', 'MovieController@AddComment')->name('MoviesComments');

Route::get('/mongodb', function () {
    return view('mongodb');
});

/*ADMIN
MovieStore*/

Route::get('/admin/movies', 'MovieController@Index');

Route::get('/admin/movies/create', "MovieController@Create");

Route::post('/admin/movies/create', "MovieController@Store");

Route::get('/admin/movies/{id}', "MovieController@Show");

Route::get('/admin/movies/edit/{id}', "MovieController@Edit");

Route::post('/admin/movies/edit', "MovieController@Update");

Route::get('/admin/movies/delete/{id}', "MovieController@Delete");

Route::delete('/admin/movies/delete', "MovieController@Remove");

//SerieStore

Route::get('/series', 'SerieController@serieStore')->name('SerieStore');

Route::get('/series/{id}', 'SerieController@Details')->name('SerieDetails');

Route::post('/series/comment', 'SerieController@AddComment')->name('SeriesComments');

Route::get('/mongodb', function () {
    return view('mongodb');
});

/*ADMIN
SerieStore*/

Route::get('/admin/series', 'SerieController@Index');

Route::get('/admin/series/create', "SerieController@Create");

Route::post('/admin/series/create', "SerieController@Store");

Route::get('/admin/series/{id}', "SerieController@Show");

Route::get('/admin/series/edit/{id}', "SerieController@Edit");

Route::post('/admin/series/edit', "SerieController@Update");

Route::get('/admin/series/delete/{id}', "SerieController@Delete");

Route::delete('/admin/series/delete', "SerieController@Remove");

//VideogameStore

Route::get('/videogames', 'VideogameController@videogameStore')->name('VideogameStore');

Route::get('/videogames/{id}', 'VideogameController@Details')->name('VideogameDetails');

Route::post('/videogames/comment', 'VideogameController@AddComment')->name('VideogamesComments');

Route::get('/mongodb', function () {
    return view('mongodb');
});

/*ADMIN
VideogameStore*/

Route::get('/admin/videogames', 'VideogameController@Index');

Route::get('/admin/videogames/create', "VideogameController@Create");

Route::post('/admin/videogames/create', "VideogameController@Store");

Route::get('/admin/videogames/{id}', "VideogameController@Show");

Route::get('/admin/videogames/edit/{id}', "VideogameController@Edit");

Route::post('/admin/videogames/edit', "VideogameController@Update");

Route::get('/admin/videogames/delete/{id}', "VideogameController@Delete");

Route::delete('/admin/videogames/delete', "VideogameController@Remove");

//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
