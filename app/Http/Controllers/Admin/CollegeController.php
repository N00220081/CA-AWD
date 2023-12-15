<?php

namespace App\Http\Controllers\Admin;

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
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $colleges = College::all();

        return view('admin.colleges.index')->with('colleges', $colleges);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $user->authorizeRoles(['admin']);

        $colleges = College::all();

        return view('admin.colleges.create')->with('colleges', $colleges);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'college_id' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);

        College::create([
            'college_id' => $request->college_id,
            'name' => $request->name,
            'address' => $request->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('admin.colleges.index')->with('success', 'College added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // You might need to review the condition below
        if (!$user->id) {
            return abort(403);
        }

        $colleges = $student->colleges;

        return view('admin.colleges.show', compact('college', 'colleges'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Unused variable $colleges
        return view('admin.colleges.edit')->with('college', 'colleges');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, College $college)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);

        $college->update([
            'id' => $request->id,
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.colleges.show', $college)->with('success', 'College updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $college = College::find($id);
        $college->delete();

        return redirect()->route('admin.colleges.index')->with('success', 'College successfully removed');
    }
}
