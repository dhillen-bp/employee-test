<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $departments = Department::all();
    $positions = Position::all();
    $employees = Employee::all();
    return view('pages.index', compact('departments', 'positions', 'employees'));
})->name('index');

Route::prefix('department')->name('department.')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [DepartmentController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
});

Route::prefix('position')->name('position.')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('index');
    Route::get('/create', [PositionController::class, 'create'])->name('create');
    Route::post('/store', [PositionController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PositionController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [PositionController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [PositionController::class, 'destroy'])->name('destroy');
});

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [EmployeeController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('destroy');
});
