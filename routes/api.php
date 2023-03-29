<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::apiResource('books', BookController::class)->parameters(['books' => 'isbn']);

Route::apiResource('genres', GenreController::class);

// Route::controller(App\Http\Controllers\BookController::class)->group(function () {
//     Route::get('books', 'index')->middleware(['auth:api','permission:list books']);
//     Route::get('book/{id}', 'show')->middleware(['auth:api','permission:list books']);
//     Route::post('book', 'store')->middleware(['auth:api','permission:add book']);
//     Route::put('books/{id}', 'update')->middleware(['auth:api','permission:edit book']);
//     Route::delete('book/{id}', 'destroy')->middleware(['auth:api','permission:delete book']);
//     Route::get('book/category/{id}', 'filter')->middleware(['auth:api','permission:filter books']);
// });