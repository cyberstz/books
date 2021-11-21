<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'name' => $faker->words($faker->numberBetween(1, 4), true),
            'author_id' => $faker->numberBetween(1, 60)
        ];
    }
}
