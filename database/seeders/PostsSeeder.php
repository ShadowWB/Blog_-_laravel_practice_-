<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        User::all()->each(function ($user) use ($categories) {
            $user->posts()->saveMany(
                Post::factory()->count(config('blog.seeds.post'))->create([
                    'user_id' => $user->id,
                    'category_id' => $categories->random()->id,
                ])
            );
        });
    }
}
