<?php
namespace App\Http\Traits;

use App\Model\Approve;
use App\Model\Artiste;
use Illuminate\Support\Facades\Input;

trait SearchTrait {

	public function search() {

		$query = Input::get('search');

		$search = Artiste::join('approves', 'artistes.id', '=', 'approves.artiste_id')
						->where('approves.song_name', 'LIKE', '%'. $query. '%')
						->orWhere('approves.lyrics', 'LIKE', '%'.$query. '%')
						->orWhere('artistes.artiste_name', 'LIKE', '%'.$query.'%')
						->paginate(200);

		if($search->isEmpty()) 
		{
			session()->flash('failure', 'No search results found.');

			return back();
		}

		return view('search', compact('search'));
	}

}