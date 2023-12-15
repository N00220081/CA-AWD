<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $courses = Course::all();

        return view('admin.courses.index')->with('courses', $courses);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles(['admin']);

        $courses = Course::all();

        return view('admin.courses.create')->with('courses', $courses);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
        ]);

        Course::create([
            'name' => $request->name,
            'department' => $request->department,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $students = $course->students;
        return view('admin.courses.show', compact('course', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.courses.edit')->with('course', Course::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
        ]);

        $course->update([
            'name' => $request->name,
            'department' => $request->department,
        ]);

        return redirect()->route('admin.courses.show', $course)->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course successfully removed');
    }
}
