<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function privacy()
    {
    	return view('privacy');
    }

    public function about()
    {
    	return view('about');
    }
}
