<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()
        ->times(3)
        ->create();

        foreach(Student::all() as $student)
        {
            $courses = Course::inRandomOrder()->take(rand(1,3))->pluck('id');
            $student->courses()->attach($courses);
        }
    }
}
