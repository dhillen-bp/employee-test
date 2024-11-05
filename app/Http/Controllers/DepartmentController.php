<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('pages.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required|min:3',
            'description' => 'string|nullable',
        ], [
            'name.required' => 'name must be filled.',
            'name.min' => 'name at least 3 characters.',
        ]);

        // Create the alternative record
        $department = Department::create($validated);

        if ($department) {
            return redirect()->route('department.index')->with('success_message', 'Department data successfully added!');
        }
        return redirect()->back()->with('error_message', 'Department data added failed!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('pages.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|required|min:3',
            'description' => 'string|nullable',
        ], [
            'name.required' => 'name must be filled.',
            'name.min' => 'name at least 3 characters.',
        ]);

        $department = Department::findOrFail($id);

        $departmentUpdated = $department->update($validated);

        if ($departmentUpdated) {
            return redirect()->route('department.index')->with('success_message', 'Department data successfully updated!');
        }
        return redirect()->back()->with('error_message', 'Department data updated failed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Department::where('id', $id)->delete();

        return redirect()->route('department.index')
            ->with('success_message', 'Data  department deleted sucessfully!');
    }
}
