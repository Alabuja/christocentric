<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Artiste;
use App\Model\Approve;
use App\Model\Song;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;
 
class ArtisteController extends Controller
{
    public function addArtiste()
	{
		$artiste = [
			'artistes' => Song::select('artiste_name')->distinct()->get(),
		];
		return view('admin.newartiste', $artiste);
	}

	public function getSubmission()
	{
		$song = [
			'songs' => Song::all(),
			'songs' => Song::paginate(10),
		];
		return view('admin.submissions', $song);
	}

	/**
	* Change this place to get from the approves table
	*/
	public function getArtiste()
	{
		$allArtiste = [
			'artistes' => Approve::all(),
			'artistes' => Approve::paginate(10),
		];
		return view('admin.artistes', $allArtiste);
	}

	public function getSingleArtiste($id) 
	{

        $songs = Artiste::join('approves', 'artistes.id', '=', 'approves.artiste_id')
        					->where('artistes.id', '=', $id)
        					->select('artistes.artiste_name', 'artistes.biography', 'approves.song_name')
        					->get();
        					
		return view('admin.singleartiste', compact('songs'));
	}


	public function editSingleArtiste($id)
	{
		$artistesBiography = Artiste::find($id);
		return view('admin.editbiography', compact('artistesBiography'));
	}

	public function updateSingleArtiste(Request $request, $id)
	{
		$artistesBiography = Artiste::findOrFail($id);
		$this->validate($request, [
			'artiste_name' => 'required',
			'biography' => ''
		]);

		$artistesBiography->fill($request->all())->save();

		$request->session()->flash('success', 'Artiste Biography has been updated successfully!!!');
        return back();
	}

	/**
	*  End the Change above i.e. for both method above, it should get from the table approves
	*/

	public function postArtiste(Request $request)
	{
		$this->validate($request, [
    		'artiste_name' => 'required',
    		'biography' => '',
    	]);

    	$artistes = new Artiste;

    	$artistes->artiste_name = $request->input('artiste_name');
    	$artistes->biography = $request->input('biography');

    	$artistes->save();

        $request->session()->flash('success', 'New Artiste Added!!!');
        return back();

	}
}
