<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('position.department')->get();
        return view('pages.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::all();
        return view('pages.employee.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request data
        $validated = $request->validate([
            'name' => 'string|required|min:3',
            'email' => 'required|email|unique:employees,email',
            'phone' => ["nullable", "regex:/^(?:\+62|62|0)8[1-9][0-9]{6,10}$/"],
            'address' => 'nullable|string',
            'position_id' => 'required|exists:positions,id',
            'hire_date' => 'required|date|before_or_equal:today',
            'salary' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:active,inactive',
            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'name must be filled.',
            'name.min' => 'name at least 3 characters.',
            'email.unique' => 'The email has already been taken.',
            'phone.regex' => 'Phone number format is invalid.',
            'position_id.required' => 'position must be filled.',
            'position_id.exists' => 'invalid selected position.',
            'salary.numeric' => 'Salary must be a number.',
            'status.in' => 'Status must be either active or inactive.',
            // 'photo.image' => 'The file must be an image.',
            // 'photo.mimes' => 'The image must be in jpeg, png, jpg, or gif format.',
            // 'photo.max' => 'The image size must not exceed 2MB.',
        ]);

        // Convert hire_date to Y-m-d format if it's in m/d/Y format
        if (isset($validated['hire_date'])) {
            $validated['hire_date'] = Carbon::createFromFormat('m/d/Y', $validated['hire_date'])->format('Y-m-d');
        }

        $validated['address'] = $request->input('address');
        $validated['photo'] = $request->input('photo');
        // dd($validated['photo']);
        // Handle file upload for photo
        if ($validated['photo']) {
            $newFilename = Str::after($validated['photo'], 'tmp/');
            // dd($validated['photo']);
            Storage::disk('public')->move($validated['photo'], "images/employee/$newFilename");
            $validated['photo'] = $newFilename;
        }

        // Create employee record in the database
        $employee = Employee::create($validated);

        // Return response based on the success of the creation
        if ($employee) {
            return redirect()->route('employee.index')->with('success_message', 'Employee data successfully added!');
        }

        return redirect()->back()->with('error_message', 'Employee data addition failed!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::with('position.department')->findOrFail($id);

        $photoUrl = $employee->photo ? Storage::url('images/employee/' . $employee->photo) : asset('images/profile/user_profile.jpeg');

        return response()->json([
            'name' => $employee->name,
            'email' => $employee->email,
            'phone' => $employee->phone,
            'address' => $employee->address,
            'position' => $employee->position->name,
            'department' => $employee->position->department->name,
            'hire_date' => Carbon::parse($employee->hire_date)->format('d-m-Y'),
            'salary' => 'Rp ' . number_format($employee->salary, 0, ',', '.') . ' / bulan',
            'status' => $employee->status,
            'photo' => $photoUrl,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $positions = Position::all();

        return view('pages.employee.edit', compact('positions', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi request data
        $validated = $request->validate([
            'name' => 'string|required|min:3',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => ["nullable", "regex:/^(?:\+62|62|0)8[1-9][0-9]{6,10}$/"],
            'address' => 'nullable|string',
            'position_id' => 'required|exists:positions,id',
            'hire_date' => 'required|date|before_or_equal:today',
            'salary' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:active,inactive',

        ], [
            'name.required' => 'name must be filled.',
            'name.min' => 'name at least 3 characters.',
            'email.unique' => 'The email has already been taken.',
            'phone.regex' => 'Phone number format is invalid.',
            'position_id.required' => 'position must be filled.',
            'position_id.exists' => 'invalid selected position.',
            'salary.numeric' => 'Salary must be a number.',
            'status.in' => 'Status must be either active or inactive.',

        ]);

        if (isset($validated['hire_date'])) {
            $validated['hire_date'] = Carbon::createFromFormat('m/d/Y', $validated['hire_date'])->format('Y-m-d');
        }

        if ($request->hasFile('photo')) {

            if ($employee = Employee::find($id)) {
                $oldPhoto = $employee->photo;
                if ($oldPhoto && Storage::disk('public')->exists("images/employee/$oldPhoto")) {
                    Storage::disk('public')->delete("images/employee/$oldPhoto");
                }

                $newFilename = Str::after($request->file('photo')->store('public/images/employee'), 'public/');
                $validated['photo'] = $newFilename;
            }
        } else {

            $employee = Employee::find($id);
            $validated['photo'] = $employee->photo;
        }

        $employee = Employee::find($id);
        $employee->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'position_id' => $validated['position_id'],
            'hire_date' => $validated['hire_date'],
            'salary' => $validated['salary'],
            'status' => $validated['status'],
            'photo' => $validated['photo'],
        ]);

        // Redirect dengan pesan berhasil
        return redirect()->route('employee.index')->with('success_message', 'Employee data successfully updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employee::where('id', $id)->delete();

        return redirect()->route('employee.index')
            ->with('success_message', 'Data  employee deleted sucessfully!');
    }

    public function upload(Request $request)
    {
        // Validasi file
        // $validated = $request->validate([
        //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = now()->timestamp . '-' . Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('tmp', $filename, 'public');

            return $path;
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }


    public function revert(Request $request)
    {
        Storage::disk('public')->delete($request->getContent());
    }


    // API
    public function showAllEmployee()
    {
        $employees = Employee::with('position.department')->get();
        // return response()->json(['data' => $employees]);
        return EmployeeResource::collection($employees);
    }
}
