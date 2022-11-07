<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserForumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('login/logout', [LoginController::class, 'logout']);
Route::resource('login', LoginController::class)->only(['index', 'show']);
Route::resource('comment', CommentController::class)->except(['index', 'create', 'show']);
Route::resource('post', PostController::class)->except(['show']);
Route::resource('user', UserForumController::class)->only(['create', 'store']);