<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::all();

        return view('user.colleges.index')->with('colleges', $colleges);
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        if (!Auth::check()) {
            // User is not authenticated, redirect to login page or show a custom error page
            return redirect()->route('login')->with('error', 'Please log in to view this content.');
        }

        $students = $college->students;

        return view('user.colleges.show', compact('college', 'students'));
    }
}
