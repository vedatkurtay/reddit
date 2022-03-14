<?php

namespace Database\Factories;

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
            'community_id' => rand(1, 30),
            'user_id' => rand(1, 100),
            'title' => $this->faker->text('25'),
            'post_text' => $this->faker->text('150')
        ];
    }
}
