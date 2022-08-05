<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   User::truncate();
        Post::truncate();
        Category::truncate();
        $user = User::factory()->create([
            "name" => "John Doe"
        ]);
        Post::factory(3)->create([
            'user_id' => $user->id
        ]);
        $user2 = User::factory()->create([
            "name" => "Nick Bare"
        ]);
        Post::factory(3)->create([
            'user_id' => $user2->id
        ]);
        
     
    }
}
