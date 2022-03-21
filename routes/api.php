<?php

// use App\Http\Controllers\BookController as Book;
// use App\Http\Controllers\CategoryController as Category;
// use App\Http\Controllers\AuthorController as Author;
// use App\Http\Controllers\AuthController;

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

Route::resource('books', BookController::class);
Route::resource('category', CategoryController::class);
Route::resource('author', AuthorController::class);



Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/index', AuthController::class);
});