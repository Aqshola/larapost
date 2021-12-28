<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(mt_rand(1, 3)),
            'slug' => $this->faker->slug(mt_rand(1, 3))
        ];
    }
}
