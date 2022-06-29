<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::post('/posts/edit/{id}', [PostController::class, 'edit']);
Route::post('/posts/{id}/destroy', [PostController::class, 'destroy']);

Route::get('/posts/img/{id}', [PostController::class, 'image_show']);

Route::delete('/post-image/{id}/delete', [PostController::class, 'image_delete']);