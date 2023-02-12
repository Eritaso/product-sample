<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileEloquentFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'sexType' => 0,
            'tel' => '08011112222',
        ];
    }
}
