<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        $title = "About Us";
        $description = "This is the about page description.";
        return view('about', compact('title', 'description'));
    }
}
