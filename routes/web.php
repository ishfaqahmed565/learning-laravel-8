<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    
    $posts = Post::all();
 
    return view('posts',compact('posts'));
});

Route::get('/posts/{post}', function ($id) {
    // get a post using its slug and return a view
    $post = Post::findOrFail($id);
    return view('post',compact('post'));

});

