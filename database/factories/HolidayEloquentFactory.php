<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HolidayEloquentFactory extends Factory
{
    public function definition()
    {
        return [
            'holiday_type' => fake()->randomElement(['0', '1', '3', '4', '5', '6', '7']),
        ];
    }
}
