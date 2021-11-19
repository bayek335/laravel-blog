<?php

namespace Database\Factories;

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
        return [
            'title' => $this->faker->paragraph(mt_rand(1, 3)),
            'excerpt' => $this->faker->paragraph(),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->paragraph(25),
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 2),
            'published_at' => date('dmy')
        ];
    }
}
