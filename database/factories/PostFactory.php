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
            'post_title' => $this->faker->name(),
            'post_type' => 'image',
            'post_body' => $this->faker->sentence(90),
            'post_url' => 'images/1.jpg',
            'user_id' => '1',
        ];
    }
}
