<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostVoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $votes = [-1, 1];
        return [
            'post_id' => rand(1, 30),
            'user_id' => rand(1, 30),
            'vote' => $votes[rand(0, 1)]
        ];
    }
}
