<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{

// responsible for generating fake data for the Student model
public function definition(): array
{
    return [
        'name' => fake()->name,
        'address' => fake()->address,
        'dob' => fake()->date(),
        'number' => fake()->phoneNumber,
        'college_id' => fake()->randomNumber,
        'created_at' => now(),
        'updated_at' => now(),
        ];
    }
}
