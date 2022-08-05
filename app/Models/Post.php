<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
class Post extends Model

{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category','author'];
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
