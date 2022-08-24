<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->words(3,true);
        return [
            'name'=>$name,
            'slug'=> \strtolower(
                \str_replace(' ','-',$name)
            ),
        ];
    }
}
