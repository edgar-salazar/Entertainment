<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class BookController extends Controller
{

    //USER
    //Index

    public function BookStore() {
        $collection = (new MongoDB\Client)->Entertainment->Books;
        $bookCount = $collection->count();
        $page = request("pg") == 0 ? 1 : request("pg");
        $books = $collection->find([], ["limit" => 12, "skip" => ($page-1) * 12]);  
        return view('Books.index', ['books' => $books, 'bookCount' => $bookCount]);
    }

        //AddComments
        
        public function AddComment() {
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $comment = [
                "user_id" => request('userid'),
                "comment" => request('comment'),
                "date" => date("Y-m-d H:i:s")            ];
            $book= $collection->findOne([ "_id" => new MongoDB\BSON\ObjectId(request('bookid')) ]);
            $Comments = $book->Comments;
            if (count($Comments) == 0 || $Comments == null || empty($Comments)) {
                $Comments = [$comment];
            } else {
                $Comments = [$comment, ...$Comments];
            }
            $updateOneResult = $collection->updateOne([
                "_id" => new MongoDB\BSON\ObjectId(request('bookid'))
            ],[
                '$set' => [ 'Comments' => $Comments ]
            ]);

            return redirect("/books/".request('bookid'));
        }

        //Details

        public function Details($id) {
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $book = $collection->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
            return view('Books.Details', [ "book" => $book]);
        }

    //ADMIN
    //Index

    public function Index() {
        $collection = (new MongoDB\Client)->Entertainment->Books;
        $books = $collection->find();  
        return view('Admin.Books.index', ['books' => $books]);
    }

    public function Store() {
        $book = [
            "Titulo" => request("Titulo"),
            "Autor" => request("Autor"),
            "NumPaginas" => request("NumPaginas"),
            "Pais" => request("Pais"),
            "Descripcion" => request("Descripcion"),
            "Rating" => [],
            "Comments" => []
        ];
        $collection = (new MongoDB\Client)->Entertainment->Books;
        $insertOneResult = $collection->insertOne($book);
        return redirect("/admin/books");
    }
    
        //Create

        public function Create() {
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $book = $collection->find();
            return view('admin.Books.create', [ "books" => $book ]);
        }

        //Edit

        public function Edit($id) {
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $book = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Books.edit', [ "book" => $book]);
        }    
        
        public function Update(){
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $book = [
                "Titulo" => request("Titulo"),
                "Autor" => request("Autor"),
                "NumPaginas" => request("NumPaginas"),
                "Pais" => request("Pais"),
                "Descripcion" => request("Descripcion"),
                "Rating" => [],
                "Comments" => []
            ];
            $updateOneResult = $collection->updateOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("bookid"))
            ], [
                '$set' => $book
            ]);
            return redirect('/admin/books/');
        }

        //Delete

        public function Delete($id) {
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $book = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('Admin.Books.delete', [ "book" => $book ]);
        }
        
        public function Remove(){
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $deleteOneResult = $collection->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("bookid"))
            ]);
            return redirect('/admin/books/');
        }

        public function Show($id) {
            $collection = (new MongoDB\Client)->Entertainment->Books;
            $book = $collection->findOne([ "_id" => new MongoDB\BSON\ObjectID($id) ]);
            return view('admin.Books.details', [ "book" => $book ]);
        }
}
