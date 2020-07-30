<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class MovieController extends Controller
{
    
    //USER
    //Index
    
    public function MovieStore() {
        $collection = (new MongoDB\Client)->Entertainment->Movies;
        $movieCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $movies = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Movies.index', ['movies' => $movies, 'movieCount' => $movieCount]);
    }

        //AddComment

        public function AddComment() {
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $comment = [
                "user_id" => request('userid'),
                "comment" => request('comment'),
                "date" => date("Y-m-d H:i:s")            ];
            $movie= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('movieid')) ]);
            $Comments = $movie->Comments;
            if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
                $Comments = [$comment];
            } else {
                $Comments = [$comment, ...$Comments];
            }
            $updateOneResult = $collection->updateOne([
                "_id" => new MongoDB\BSON\ObjectId(request('movieid'))
            ],[
                '$set' => [ 'Comments' => $Comments ]
            ]);

            return redirect("/movies/".request('movieid'));
        }

        //Details

        public function Details($id) {
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $movie = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
            return view('Movies.Details', [ "movie" => $movie]);
        }

    //ADMIN
    //Index
    
    public function Index() {
        $collection = (new MongoDB\Client)->Entertainment->Movies;
        $movies = $collection->find();  
        return view('Admin.Movies.index', ['movies' => $movies]);
    }

    public function Store() {
        $movie = [
            "Titulo" => request("Titulo"),
            "Direccion" => request("Direccion"),
            "Duracion_min" => request("Duracion_min"),
            "Pais" => request("Pais"),
            "Descripcion" => request("Descripcion"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Entertainment->Movies;
        $insertOneResult = $collection->insertOne($movie);
        return redirect("/admin/movies");
    }
    
        //Create

        public function Create() {
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $movie = $collection->find();
            return view('admin.Movies.create', [ "movies" => $movie ]);
        }

        //Edit

        public function Edit($id) {
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $movie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Movies.edit', [ "movie" => $movie]);
        }    
        
        public function Update(){
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $movie = [
                "Titulo" => request("Titulo"),
                "Direccion" => request("Direccion"),
                "Duracion_min" => request("Duracion_min"),
                "Pais" => request("Pais"),
                "Descripcion" => request("Descripcion"),
                "Rating" => [],
                "Comments" => []
            ];
            $updateOneResult = $collection->updateOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
            ], [
                '$set' => $movie
            ]);
            return redirect('/admin/movies/');
        }

        //Delete

        public function Delete($id) {
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $movie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Movies.delete', [ "movie" => $movie ]);
        }
        
        public function Remove(){
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $deleteOneResult = $collection->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
            ]);
            return redirect('/admin/movies/');
        }

        public function Show($id) {
            $collection = (new MongoDB\Client)->Entertainment->Movies;
            $movie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('admin.Movies.details', [ "movie" => $movie ]);
        }
    
}
