<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class VideogameController extends Controller
{
    

    //USER
    //Index

    public function VideogameStore() {
        $collection = (new MongoDB\Client)->Entertainment->Videogames;
        $videogameCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $videogames = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Videogames.index', ['videogames' => $videogames, 'videogameCount' => $videogameCount]);
    }

        //AddComments

        public function AddComment() {
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $comment = [
                "user_id" => request('userid'),
                "comment" => request('comment'),
                "date" => date("Y-m-d H:i:s")            ];
            $videogame= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('videogameid')) ]);
            $Comments = $videogame->Comments;
            if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
                $Comments = [$comment];
            } else {
                $Comments = [$comment, ...$Comments];
            }
            $updateOneResult = $collection->updateOne([
                "_id" => new MongoDB\BSON\ObjectId(request('videogameid'))
            ],[
                '$set' => [ 'Comments' => $Comments ]
            ]);

            return redirect("/videogames/".request('videogameid'));
        }

        //Details

        public function Details($id) {
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $videogame = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
            return view('Videogames.Details', [ "videogame" => $videogame]);
        }

    //ADMIN
    //Index

    public function Index() {
        $collection = (new MongoDB\Client)->Entertainment->Videogames;
        $videogames = $collection->find();  
        return view('Admin.Videogames.index', ['videogames' => $videogames]);
    }

    public function Store() {
        $videogame = [
            "Titulo" => request("Titulo"),
            "Desarrollo" => request("Desarrollo"),
            "Unidades_vendidas" => request("Unidades_vendidas"),
            "Descripcion" => request("Descripcion"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Entertainment->Videogames;
        $insertOneResult = $collection->insertOne($videogame);
        return redirect("/admin/videogames");
    }
    
        //Create

        public function Create() {
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $videogame = $collection->find();
            return view('admin.Videogames.create', [ "videogames" => $videogame ]);
        }

        //Edit

        public function Edit($id) {
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Videogames.edit', [ "videogame" => $videogame]);
        }    
        
        public function Update(){
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $videogame = [
                "Titulo" => request("Titulo"),
                "Desarrollo" => request("Desarrollo"),
                "Unidades_vendidas" => request("Unidades_vendidas"),
                "Descripcion" => request("Descripcion"),
                "Rating" => [],
                "Comments" => []
            ];
            $updateOneResult = $collection->updateOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("videogameid"))
            ], [
                '$set' => $videogame
            ]);
            return redirect('/admin/videogames/');
        }

        //Delete

        public function Delete($id) {
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Videogames.delete', [ "videogame" => $videogame ]);
        }
        
        public function Remove(){
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $deleteOneResult = $collection->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("videogameid"))
            ]);
            return redirect('/admin/videogames/');
        }

        public function Show($id) {
            $collection = (new MongoDB\Client)->Entertainment->Videogames;
            $videogame = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('admin.Videogames.details', [ "videogame" => $videogame ]);
        }
}
