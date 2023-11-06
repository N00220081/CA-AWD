<?php

namespace App\Http\Controllers;

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
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Student::create([
        'name' => $request->name,
        'dob' => $request->dob,
        'address' => $request->address,
        'number' => $request->number,
        'college_id' => $request->college_id,
        'created_at' => now(),
        'updated_at' => now()
        ]);
        return to_route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
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

        return to_route('students.show', $student)->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return to_route('students.index')->with('success', 'Student successfully removed');
    }
}
