<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        return view('blog');
    }

    public function blogDetail(){
        return view('blogdetail');
    }
}
