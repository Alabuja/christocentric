<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Model\Artiste;
// use App\Model\Approve;
use App\Http\Traits\SearchTrait;
// use Illuminate\Support\Facades\Input;


class SearchController extends Controller
{

	use SearchTrait;

	$this->search();

    // public function find(Request $request)
    // {
    // 	return Artiste::search($request->get('q'))->with('artistes')->get();
    // }
}
