<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    // Return all quotes paginated by 10
    function getAllQuotes() {
        $quotes = Quote::select(["id", "body", "author_id"])->paginate(10);

        return response($quotes, 200);
    }


   // Return all quotes by author paginated by 10
    function getQuotesByAuthor(Author $author) {
        $quotes = $author->quotes()->select([ "id", "body", "author_id"])->paginate(10);
        return response($quotes, 200);
    }
    // Create a new quote
    function createQuote(Request $request) {
        $quote = new Quote;
        $quote->author_id = $request->author_id;
        $quote->body = $request->body;
        $quote->save();

        return response()->json([
            "message" => "quote record created",
            "quote" => $quote->body,
            "author" => $quote->author
        ], 201);

    }
    // return a single quote
    function getQuote($id) {
        if (Quote::where('id', $id)->exists()) {
            $quote = Quote::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($quote, 200);
        } else {
            return response()->json([
                "message" => "quote not found"
            ], 404);
        }
    }
    // Update a quote
    function updateQuote(Request $request, $id) {
        if (Quote::where('id', $id)->exists()) {
            $quote = Quote::find($id);
            $quote->author_id = is_null($request->author_id) ? $quote->author_id : $request->author_id;
            $quote->body = is_null($request->body) ? $quote->body : $request->body;
            $quote->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "quote not found"
            ], 404);
        }
    }
    // delete a quote
    function deleteQuote ($id) {
        if(Quote::where('id', $id)->exists()) {
            $quote = Quote::find($id);
            $quote->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Quote not found"
            ], 404);
        }
    }
    // return a random quote
    function getRandomQuote() {
        return   $quotes = Quote::all("id", "body", "author_id")->random();
    }
}
