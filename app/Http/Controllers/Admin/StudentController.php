<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller{

public function index()
{
    $user = Auth::user();
    $user->authorizeRoles('admin');

    // $students = Student::paginate(10);
    $students = Student::with('college')->get();

    return view('admin.students.index')->with('students', $students);
}

public function create()
{
    $user = Auth::user();
    $user->authorizeRoles('admin');

    $colleges = College::all(); // Define the $colleges variable
    $courses = Course::all();

    return view('admin.students.create')->with('colleges', $colleges)->with('courses', $courses);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'number' => 'required',
            'college_id' => 'required',
            'courses' =>['required' , 'exists:authors,id']

        ]);

        $student = Student::create([
        'name' => $request->name,
        'dob' => $request->dob,
        'address' => $request->address,
        'number' => $request->number,
        'college_id' => $request->college_id,
        'created_at' => now(),
        'updated_at' => now()
        ]);

        $student->courses()->attach($request->courses);

        return to_route('admin.students.index');
    }

    public function edit(string $id)
{   
    $user = Auth::user();
    $user->authorizeRoles('admin');

    $colleges = College::all(); // Define the $colleges variable

    $student = Student::find($id);

    return view('admin.students.edit', compact('student', 'colleges'));
}


public function show(string $id)
    {
        $student = Student::find($id);
        return view('admin.students.show')->with('student', $student);
    }

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required',
        'dob' => 'required|date',
        'address' => 'required',
        'number' => 'required',
        'college_id' => 'required'
    ]);

    $student->update([
        'name' => $request->name,
        'dob' => $request->dob,
        'address' => $request->address,
        'number' => $request->number,
        'college_id' =>$request->college_id
    ]);

    return to_route('admin.students.show', $student)->with('success','Student updated successfully');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $student = Student::find($id);
    $student->delete();
    return to_route('admin.students.index')->with('success', 'Student successfully removed');
}

}