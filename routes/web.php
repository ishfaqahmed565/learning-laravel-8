<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;

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
Route::get('/', [PostController::class,'index'])->name('home');
Route::post('/admin/posts',[AdminPostController::class,'store'])->middleware('can:admin');
Route::get('/posts/{post:slug}', [PostController::class,'show']);
Route::post('/posts/{post:slug}/comments',[CommentsController::class,'store'])->middleware('auth');

Route::get('admin/posts/create',[AdminPostController::class,'create'])->middleware('can:admin');
Route::get('/admin/posts',[AdminPostController::class,'index'])->middleware('can:admin');
Route::get('/admin/posts/{post}/edit',[AdminPostController::class,'edit'])->middleware('can:admin');
Route::patch('/admin/posts/{post}',[AdminPostController::class,'update'])->middleware('can:admin');
Route::delete('/admin/posts/{post}',[AdminPostController::class,'destroy'])->middleware('can:admin');


Route::post('newsletter', NewsletterController::class);

Route::get('/register',[RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');

Route::post('/logout',[SessionsController::class,'destroy'])->middleware('auth');
Route::get('/login',[SessionsController::class,'create'])->middleware('guest');
Route::post('/login',[SessionsController::class,'store'])->middleware('guest');


