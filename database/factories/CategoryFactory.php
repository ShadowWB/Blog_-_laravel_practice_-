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
        $name=config('blog.categories');
        $someName=$name[\array_rand($name)];
        return [
            'name'=>$someName,
            'slug'=> \strtolower(
                \str_replace(' ','-',$someName)
            ),
        ];
    }
}
