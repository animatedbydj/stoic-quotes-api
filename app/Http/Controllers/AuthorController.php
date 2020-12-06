<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    function createAuthor(Request $request) {

//        $author = new Author;
//        $author->name = $request->name;
//        $author->save();
//
//        return response()->json([
//            "message" => "Author record created"
//        ], 201);

    }

    function getAllAuthors() {
        $authors = Author::get()->toJson(JSON_PRETTY_PRINT);
        return response($authors, 200);
    }
}
