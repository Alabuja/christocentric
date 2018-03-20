<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Artiste;
use App\Model\Approve;
use App\Http\Traits\SearchTrait;
// use Illuminate\Support\Facades\Input;


class SearchController extends Controller
{

	public function search() {

		$query = Input::get('search');

		$search = Artiste::join('approves', 'artistes.id', '=', 'approves.artiste_id')
						->where('approves.song_name', 'LIKE', '%'.$query.'%')
						->orWhere('approves.lyrics', 'LIKE', '%'.$query. '%')
						->orWhere('artistes.artiste_name', 'LIKE', '%'.$query.'%')
						->paginate(200);

		if($search->isEmpty()) 
		{
			session()->flash('failure', 'No search results found.');

			return back();
		}

		return view('search', compact('search', 'query'));
	}
}
