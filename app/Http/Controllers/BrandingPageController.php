<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Enroll;
use App\Models\Gallery;
use App\Models\Teacher;
use Illuminate\Http\Request;



class BrandingPageController extends Controller
{

    public function index(){
        return view('welcome');
    }
    public function student(){
       
        return view('student',compact('students')); // Change to your actual Blade file


    }




public function teacher()
{    // Eager load batchDetails and enrollments
    $teachers = Teacher::with('batchDetails.batch.enrollments')->paginate(4);

    foreach ($teachers as $teacher) {
        // Count unique batches
        $teacher->unique_batches = $teacher->batchDetails->pluck('batch_id')->unique()->count();

        // Get all enrollments from all batches linked to this teacher
        $batchIds = $teacher->batchDetails->pluck('batch_id')->unique();
        
        $studentCount = Enroll::whereIn('batch_id', $batchIds)->pluck('student_id')->unique()->count();
        $teacher->student_total = $studentCount;
    }

    return view('teacher', compact('teachers'));
}

  
    public function course(){
        return view('course'); // Change to your actual Blade file


    }

    public function galleries()
{
    $batches = Batch::with('galleries')->get(); // get all batches with their related galleries
    return view('gallery', compact('batches')); // pass only $batches, no need to pass $galleries
}


    public function batch(){
       
        return view('batch'); // Change to your actual Blade file
    }
}
