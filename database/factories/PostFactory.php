<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = config('blog.statuses.options');
        $images = config('blog.images');

        return [
            'user_id' => fn() => User::factory()->create()->id,
            'category_id' => fn() => Category::factory()->create()->id,
            'subject'=>$this->faker->realText(30,true),
            'body'=>$this->faker->realText(1000,true),
            'status'=>$statuses[\array_rand($statuses)],
            'image_path'=>$images[\array_rand($images)]
        ];
    }
}
