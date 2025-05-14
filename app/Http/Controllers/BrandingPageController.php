<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class BrandingPageController extends Controller
{

    public function index(){
        return view('welcome');
    }
    public function student(){
        return view('student'); // Change to your actual Blade file


    }

     public function teacher(){
        return view('teacher'); // Change to your actual Blade file


    }

    public function course(){
        return view('course'); // Change to your actual Blade file


    }

    public function gallery(){
         $galleries = Gallery::all();
        return view('gallery',compact('galleries')); // Change to your actual Blade file


    }

    public function batch(){
        return view('batch'); // Change to your actual Blade file
    }
}
