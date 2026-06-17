<?php

use App\Http\Controllers\StudentController;

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
Route::get('students/create',[StudentController::class, 'create'])->name('student.create');
Route::post('students',[StudentController::class, 'store'])->name('student.store');


// Route::get('/studnets/create', function () {
//     return view('backend.students.create');
// });