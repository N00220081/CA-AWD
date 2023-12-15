<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('users.courses.index', compact('courses'));
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return view('users.courses.show')->with('course', $course);
    }

}
