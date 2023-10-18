<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'content' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'status' => $this->faker->randomElement(['draft', 'publish']),
            'cat_id' => $this->faker->numberBetween(1, 5),
            'image_id' => $this->faker->randomDigit,
        ];
    }
}
