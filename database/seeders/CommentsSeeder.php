<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $range = config('blog.seeds.comment');

        Post::all()->each(function($post) use ($range) {
            $count = \mt_rand($range['min'], $range['max']);
            $post->comments()->saveMany(
                Comment::factory()->count($count)->create([
                    'post_id' => $post->id
                ])
            );
        });
    }
}
