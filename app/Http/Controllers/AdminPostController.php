<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(50);
        return view('admin.posts.index',compact('posts'));
    }
    public function create(){
        return view('admin.posts.create');
    }
    public function store(){
        
        $attributes = $attributes = $this->validateRequest();

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);
        return redirect('/');

    }
    public function edit(Post $post){
        
        return view('admin.posts.edit',compact('post'));
    }
    public function update(Post $post){
        
        $attributes = $this->validateRequest($post);
        
        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);
        return redirect("/posts/". $post->slug)->with('success','Post Updated');

    }
    public function destroy(Post $post){
        $post->delete();
        return redirect("/admin/posts")->with('success','Post Deleted');
    }
    public function validateRequest(?Post $post = null){
        $post??= new Post();
        return request()->validate([
            'title'=>'required',
            'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt'=>'required',
            'body'=> 'required',
            'category_id'=> ['required', Rule::exists('categories','id')],
            'thumbnail'=>$post->exists?['image']:['required','image']
        ]);

    }
    
}
