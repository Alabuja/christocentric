<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\SearchTrait;

class MainController extends Controller
{
    public function privacy()
    {
    	$search = $this->search();
    	return view('privacy', compact('search'));
    }

    public function about()
    {
    	$search = $this->search();
    	return view('about', compact('search'));
    }
}
