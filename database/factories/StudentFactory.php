<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class BookFactory extends Factory
{

// responsible for generating fake data for the Student model
public function definition(): array
{
    return [
        'name' => fake()->name,
        'address' => fake()->address,
        'dob' => fake()->date($format = 'd-m-y', $max = '2010',$min = '1900'),
        'number' => fake()->phoneNumber,
        'college_id' => college()->id
            
    
        ];
    }
}
