<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

//Route::view('/blog', 'blog.index');
Route::view('/blog', 'blog');
Route::get('/comments', [BlogPostController::class, 'getComment']);
Route::post('/comments', [BlogPostController::class, 'storeComment']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
