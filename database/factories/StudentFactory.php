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
    // Responsible for generating fake data for the Student model
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'dob' => $this->faker->date(),
            'number' => $this->faker->phoneNumber,
            'college_id' => $this->faker->randomNumber,
            'created_at' => now(), 
            'updated_at' => now(), 
        ];
    }
}
