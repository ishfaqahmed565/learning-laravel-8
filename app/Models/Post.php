<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model

{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category','author'];

    public function scopeFilter($query, array $filters){
        //when() is query builder which take a value as the first argument and if the value is true it 
        //runs the callback function. The value that you pass as the first argument can
        //be called as any variable in the second argument of the callback function
        // for example $filters['search'] is called as $search in the callback.
        $query->when($filters['search']??false, function($query, $search){
                        
                        $query->where(fn($query)=>
                        $query
                        ->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body','like', '%' . $search . '%')
        );
                           
                        }
                       
                    );
        $query->
                 when($filters['category']??false, function($query, $category){
                        
                       $query->whereHas('category',fn($query)=>$query->where('slug',$category));
                        }
                       
                    );
        $query->when($filters['author']??false, fn($query,$author)=>
                    $query->whereHas('author',fn($query)=>$query->where('username',$author)));
                    
                    
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
