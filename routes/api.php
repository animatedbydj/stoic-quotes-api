<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['throttle:quotes'])->group(function () {
    Route::get('quotes', 'App\Http\Controllers\QuoteController@getAllQuotes');
    Route::post('quotes', 'App\Http\Controllers\QuoteController@createQuote');
    Route::put('quotes/{id}', 'App\Http\Controllers\QuoteController@updateQuote');
    Route::delete('quotes/{id}','App\Http\Controllers\QuoteController@deleteQuote');
    Route::get('quotes/random','App\Http\Controllers\QuoteController@getRandomQuote');
    Route::get('quotes/{author}', 'App\Http\Controllers\QuoteController@getQuotesByAuthor');


// Authors
    Route::get('authors', 'App\Http\Controllers\AuthorController@getAllAuthors');
    Route::post('authors', 'App\Http\Controllers\AuthorController@createAuthor');

});






