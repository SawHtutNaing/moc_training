<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Batch;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalBatches = Batch::count();
        $totalCourses = Course::count();

        return view('dashboard', compact('totalUsers', 'totalStudents', 'totalTeachers', 'totalBatches', 'totalCourses'));
    }
}