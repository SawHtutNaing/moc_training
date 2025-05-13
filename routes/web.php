<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Livewire\BatchDetailsManagement;
use App\Livewire\BatchManagement;
use App\Livewire\CourseManagement;
use App\Livewire\EnrollManagement;
use App\Livewire\GalleryManagement;
use  App\Livewire\Student\StudentIndex;
use App\Livewire\Student\StudentCreate;
use App\Livewire\Student\StudentEdit;
use App\Livewire\StudentManagement;
use App\Livewire\TeacherManagement;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentFrontController;
use App\Http\Controllers\TeacherFrontController;

Route::get('/studentfront', [StudentFrontController::class, 'index'])->name('studentfront');
Route::get('/teacherfront', [TeacherFrontController::class, 'index'])->name('teacherfront');


use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');



  Route::get('/dashboard', [DashboardController::class, 'index'])
 ->middleware(['auth'])
->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // Route::get("/student",StudentIndex::class)->name("student.index");
    Route::get("/student/create",StudentCreate::class)->name("student.create");
    Route::get("/student/{id}/edit",StudentEdit::class)->name("student.edit");
    Route::get("/student",StudentManagement::class)->name("student");

    Route::get("/teacher",TeacherManagement::class)->name("teacher");
    Route::get("/batch",BatchManagement::class)->name("batch");
    Route::get("/batchdetails",BatchDetailsManagement::class)->name("batchdetails");
    Route::get("/course",CourseManagement::class)->name("course");
    Route::get("/enroll",EnrollManagement::class)->name("enroll");
    Route::get("/gallery",GalleryManagement::class)->name("gallery");



    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
