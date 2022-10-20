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

        $date_from = new \DateTime(config('blog.seeds.post.date_from'));
        $date_to = new \DateTime(config('blog.seeds.post.date_to'));

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($date_from, $interval, $date_to);

        $categories = Category::all();
        $users = User::all();

        foreach($daterange as $date) {
            $users->each(function ($user) use ($categories, $date) {
                $yes_or_no = \mt_rand(0,1);
                if ($yes_or_no) {
                    $user->posts()->save(
                        Post::factory()->create([
                            'user_id' => $user->id,
                            'category_id' => $categories->random()->id,
                            'created_at' => $date->format('Y-m-d H:i:s'),
                            'updated_at' => $date->format('Y-m-d H:i:s'),
                        ])
                    );
                }
            });
        }
//        $categories = Category::all();
//
//        User::all()->each(function ($user) use ($categories) {
//            $user->posts()->saveMany(
//                Post::factory()->count(config('blog.seeds.post.count'))->create([
//                    'user_id' => $user->id,
//                    'category_id' => $categories->random()->id,
//                ])
//            );
//        });
    }
}
