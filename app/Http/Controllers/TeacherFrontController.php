<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherFrontController extends Controller
{
   public function index()
    {
        // Load a view or process data
        return view('teacherfront.index'); // Change to your actual Blade file
    }
}
