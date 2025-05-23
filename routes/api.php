<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//books
Route::apiResource('/books', BookController::class);

//genres
Route::apiResource('/genres', GenreController::class);

//authors
Route::apiResource('/authors', AuthorController::class);
