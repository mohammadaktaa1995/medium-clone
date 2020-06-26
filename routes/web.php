<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

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


Route::redirect('/', '/articles')->name('home');

Route::resource('articles', 'ArticleController', ['except' => ['update', 'edit', 'destroy']]);
Route::post('/articles/search', [ArticleController::class, 'search']);
Route::get('/category/{category}', [ArticleController::class, 'showByCategory']);
Route::get('/tag/{tag}', [ArticleController::class, 'showByTag']);

Route::post('ckeditor/upload', [ArticleController::class, 'uploadImage'])->name('ckeditor.upload');
Route::view('stories','my-stories');

Auth::routes();

