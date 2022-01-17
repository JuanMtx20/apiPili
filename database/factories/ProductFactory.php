<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text(140),
            'price' => $this->faker->randomNumber(3),
            'image' => $this->faker->image( public_path('images'),640,480, null, false)
        ];
    }
}
