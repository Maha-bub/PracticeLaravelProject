<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\DistrictController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
});
Route::get('/master', function () {
    return view('backend.master');
});

// Route::get('/students', function () {
//     return view('backend.students.index');
// });

Route::get('students',[StudentController::class,'index'])->name('student.index');
Route::get('/students/create',[StudentController::class, 'create'])->name('student.create');
Route::post('students',[StudentController::class, 'store'])->name('student.store');
Route::get('/students/{id}/edit',[StudentController::class, 'edit'])->name('student.edit');
Route::post('/students/{id}/update',[StudentController::class, 'update'])->name('student.update');
Route::get('/students/{id}/show',[StudentController::class, 'show'])->name('student.show');
Route::post('students/{id}', [StudentController::class,'destroy'])->name('student.destroy');


// Route::get('/studnets/create', function () {
//     return view('backend.students.create');
// });


Route::get('/districts/create',[DistrictController::class,'create'])->name('district.create');

//for store district
Route::post('/districts',[DistrictController::class,'store'])->name('district.store');

Route::get('/districts', [DistrictController::class, 'index'])->name('district.index');