<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentFrontController extends Controller
{
    public function index()
    {
        // Load a view or process data
        return view('studentfront.index'); // Change to your actual Blade file
    }
}
