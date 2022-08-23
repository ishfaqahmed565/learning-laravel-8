<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    
    public function index(){
       
       //Post::latest() is a query
       //Calling filter on it adds various filters to the query
       //Passing an array of filters to the filter adds information about the query for example: searching and keywords search=consequatur# We can pass the consequatur part to the query to loo for it in the title or body.
       //Filter is like the filter machine and filters are like conditons of the required data. Filters are used inside the filter machine to set the conditions of a required specific data.
       //and get() method is like the messenger that takes the query to the database and returns the data back to the website.
            
            $posts = Post::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString();
            
            return view('posts.index',compact('posts'));
    
        } 
    
    
    public function show(Post $post){
        
        return view('posts.show',compact('post'));
    }
    
    
}
