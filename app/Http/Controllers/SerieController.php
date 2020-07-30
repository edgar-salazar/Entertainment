<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class SerieController extends Controller
{
    //USER
    //Index

    public function SerieStore() {
        $collection = (new MongoDB\Client)->Entertainment->Series;
        $serieCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $series = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Series.index', ['series' => $series, 'serieCount' => $serieCount]);
    }

        //AddComment

        public function AddComment() {
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $comment = [
                "user_id" => request('userid'),
                "comment" => request('comment'),
                "date" => date("Y-m-d H:i:s")            ];
            $serie= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('serieid')) ]);
            $Comments = $serie->Comments;
            if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
                $Comments = [$comment];
            } else {
                $Comments = [$comment, ...$Comments];
            }
            $updateOneResult = $collection->updateOne([
                "_id" => new MongoDB\BSON\ObjectId(request('serieid'))
            ],[
                '$set' => [ 'Comments' => $Comments ]
            ]);

            return redirect("/series/".request('serieid'));
        }

        //Details

        public function Details($id) {
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $serie = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
            return view('Series.Details', [ "serie" => $serie]);
        }

    //ADMIN
    //Index 

    public function Index() {
        $collection = (new MongoDB\Client)->Entertainment->Series;
        $series = $collection->find();  
        return view('Admin.Series.index', ['series' => $series]);
    }

    public function Store() {
        $serie = [
            "Titulo" => request("Titulo"),
            "Creacion" => request("Creacion"),
            "Num_Temporadas" => request("Num_Temporadas"),
            "Pais" => request("Pais"),
            "Descripcion" => request("Descripcion"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Entertainment->Series;
        $insertOneResult = $collection->insertOne($serie);
        return redirect("/admin/series");
    }
    
        //Create

        public function Create() {
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $serie = $collection->find();
            return view('admin.Series.create', [ "series" => $serie ]);
        }

        //Edit

        public function Edit($id) {
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $serie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Series.edit', [ "serie" => $serie]);
        }    
        
        public function Update(){
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $serie = [
                "Titulo" => request("Titulo"),
                "Creacion" => request("Creacion"),
                "Num_Temporadas" => request("Num_Temporadas"),
                "Pais" => request("Pais"),
                "Descripcion" => request("Descripcion"),
                "Rating" => [],
                "Comments" => []
            ];
            $updateOneResult = $collection->updateOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("serieid"))
            ], [
                '$set' => $serie
            ]);
            return redirect('/admin/series/');
        }

        //Delete

        public function Delete($id) {
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $serie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Series.delete', [ "serie" => $serie ]);
        }
        
        public function Remove(){
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $deleteOneResult = $collection->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("serieid"))
            ]);
            return redirect('/admin/series/');
        }

        public function Show($id) {
            $collection = (new MongoDB\Client)->Entertainment->Series;
            $serie = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('admin.Series.details', [ "serie" => $serie ]);
        }
}
