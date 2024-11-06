<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::with('department')->get();
        return view('pages.position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $departments = Department::all();
        return view('pages.position.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|min:3',
            'department_id' => 'required|exists:departments,id',
            'description' => 'string|nullable',
        ], [
            'name.required' => 'name must be filled.',
            'name.min' => 'name at least 3 characters.',
            'department_id.required' => 'department must be filled.',
            'department_id.exists' => 'invalid selected department.',
        ]);

        // Create the alternative record
        $position = Position::create($validated);

        if ($position) {
            return redirect()->route('position.index')->with('success_message', 'Position data successfully added!');
        }
        return redirect()->back()->with('error_message', 'Position data added failed!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        $departments = Department::all();

        return view('pages.position.edit', compact('position', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|required|min:3',
            'department_id' => 'required|exists:departments,id',
            'description' => 'string|nullable',
        ], [
            'name.required' => 'name must be filled.',
            'name.min' => 'name at least 3 characters.',
            'department_id.required' => 'department must be filled.',
            'department_id.exists' => 'invalid selected department.',
        ]);

        $position = Position::findOrFail($id);

        $positionUpdated = $position->update($validated);

        if ($positionUpdated) {
            return redirect()->route('position.index')->with('success_message', 'Position data successfully updated!');
        }
        return redirect()->back()->with('error_message', 'Position data updated failed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Position::where('id', $id)->delete();

        return redirect()->route('position.index')
            ->with('success_message', 'Data  position deleted sucessfully!');
    }
}
