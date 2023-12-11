<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('users.students.index', compact('students'));
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('users.students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */

}