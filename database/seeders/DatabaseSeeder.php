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
        Post::factory(4)->create([
            'user_id' => $user->id,
            'body'=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate vero consequuntur autem quaerat praesentium, eos odit accusantium iusto debitis libero suscipit rem labore ratione porro illum ipsam magnam dolorem. Pariatur tempora ab cumque eaque ipsa quasi ducimus, sint, consequatur, itaque aperiam sapiente ea illum sed magnam! Consequuntur sapiente at magni totam enim. Labore minima numquam perferendis sit provident repellendus laboriosam, repudiandae ex pariatur optio itaque cum nobis vero obcaecati aspernatur qui non iusto amet explicabo consequatur inventore ipsam? Error, odio fugit deserunt autem repudiandae obcaecati eligendi cupiditate, impedit dolor sunt totam adipisci quis dolorum? Tempore ex ipsam fuga aut possimus."
        ]);
        $user2 = User::factory()->create([
            "name" => "Nick Bare"
        ]);
        Post::factory(5)->create([
            'user_id' => $user2->id,
            'body'=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate vero consequuntur autem quaerat praesentium, eos odit accusantium iusto debitis libero suscipit rem labore ratione porro illum ipsam magnam dolorem. Pariatur tempora ab cumque eaque ipsa quasi ducimus, sint, consequatur, itaque aperiam sapiente ea illum sed magnam! Consequuntur sapiente at magni totam enim. Labore minima numquam perferendis sit provident repellendus laboriosam, repudiandae ex pariatur optio itaque cum nobis vero obcaecati aspernatur qui non iusto amet explicabo consequatur inventore ipsam? Error, odio fugit deserunt autem repudiandae obcaecati eligendi cupiditate, impedit dolor sunt totam adipisci quis dolorum? Tempore ex ipsam fuga aut possimus."
        ]);
        
     
    }
}
