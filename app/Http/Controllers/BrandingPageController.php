<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandingPageController extends Controller
{

    public function index(){
        return view('welcome');
    }
    public function student(){
        return view('studentfront.index'); // Change to your actual Blade file


    }

    public function course(){
        return view('course'); // Change to your actual Blade file


    }

    public function gallery(){
        return view('gallery'); // Change to your actual Blade file


    }

    public function batchIndex(){

    }
}
