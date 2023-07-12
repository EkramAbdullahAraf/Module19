<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogController;

Route::view('/blog', 'blog');
Route::get('/blog-posts', [BlogController::class, 'getBlogPosts']);
Route::get('/recent-posts', [BlogController::class, 'getRecentPosts']);
Route::get('/comments', [BlogController::class, 'getComments']);
Route::post('/comments', [BlogController::class, 'storeComment']);


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
