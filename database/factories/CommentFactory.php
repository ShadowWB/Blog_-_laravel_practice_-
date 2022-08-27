<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id'=> fn() => Post::factory()->create()->id,
            'user_email'=>$this->faker->email,
            'comment'=>$this->faker->realText(200, 2),
        ];
    }
}
