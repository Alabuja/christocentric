<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Approve;
use App\Model\Artiste;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Jorenvh\Share\ShareFacade;
use App\Http\Traits\SearchTrait;

class VideoController extends Controller
{
    use SearchTrait;

    public function welcome()
    { 
        $search = $this->search();
        $welcome =  Approve::orderBy('id', 'desc')->take(28)->get();
            // 'newSongs' => Approve::paginate(30),
        //];
 
        return view('welcome', compact('welcome', 'search'));
    }

    public function lyrics()
    {
        $search = $this->search();
    	$lyrics = [
    		'Lyrics' => Approve::all(),
    		'Lyrics' => Approve::paginate(1000),
    	];

    	return view('lyrics', compact('lyrics', 'search'));
    }

    public function artisteBio()
    {
        $search = $this->search();
    	$artisteProfiles = Approve::selectRaw('artiste_id, COUNT(*) as song_name')
				 		  ->groupBy('artiste_id')
				 		  ->orderBy('artiste_id')
				 		  ->get();
        // $artisteProfiles = DB::table('artistes')
        //                     ->join('approves', 'artistes.id', '=', 'approves.artiste_id')
        //                     ->orderBy('artistes.artiste_name', 'ASC')
        //                     ->get(); 

    	return view('artisteprofile', compact('artisteProfiles', 'search'));
    }

    public function singleArtisteBio($slug)
    { 
        $search = $this->search();
        $view_data = [];

        try 
        {
            $view_data['artiste'] = $artiste = Artiste::whereSlug($slug)->first();
            $view_data['songs'] = Approve::whereArtisteId($artiste->id)->get();
            
            return view('singleartisteprofile', $view_data, compact('search'));
        } 
        catch (ModelNotFoundException $ex) 
        {
            return redirect()->back();
        }
    }

    // Work on this method to get a single song that belongs to an artiste and make the slug (url something like this (paul-femi/glorious-day))
    public function getSingleSong($slugName, $slugSong)
    {
        $search = $this->search();
        $singleSong = DB::table('artistes')
                        ->join('approves', 'artistes.id', '=', 'approves.artiste_id')
                        ->select('artistes.*', 'approves.*')
                        ->first();

        try
        {
            $singleSong = DB::table('artistes')
                            ->join('approves', 'artistes.id', '=', 'approves.artiste_id')
                            ->where('artistes.slug', '=', $slugName)
                            ->where('approves.slug', '=', $slugSong)
                            ->first();
            //$result = ShareFacade::currentPage()->facebook();

            return view('singlesong', compact('singleSong', 'search'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect()->back();
        }
    }
}
