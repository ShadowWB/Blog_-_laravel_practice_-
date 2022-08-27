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

        return [
            'user_id' => fn() => User::factory()->create()->id,
            'category_id' => fn() => Category::factory()->create()->id,
            'subject'=>$this->faker->sentence(),
            'body'=>$this->faker->realText(500,true),
            'status'=>$statuses[\array_rand($statuses)],
            'image_path'=>$this->faker->imageUrl(640,480,'animals',true)
        ];
    }
}
