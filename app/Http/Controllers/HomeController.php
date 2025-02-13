<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // return "Hello";
        return view ('welcome');
    }
    public function contact(){
        // return "Contact Us";
        return view('contact');
    }
}
