<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Approve;
use App\Model\Artiste;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Jorenvh\Share\ShareFacade;

class VideoController extends Controller
{
    public function welcome()
    { 
        $welcome = [
            'newSongs' => Approve::orderBy('id', 'desc')->take(28)->get(),
            // 'newSongs' => Approve::paginate(30),
        ];
 
        return view('welcome')->with($welcome);
    }

    public function lyrics()
    {
    	$lyrics = [
    		'Lyrics' => Approve::all(),
    		'Lyrics' => Approve::paginate(1000),
    	];

    	return view('lyrics')->with($lyrics);
    }

    public function artisteBio()
    {
    	$artisteProfiles = Approve::selectRaw('artiste_id, COUNT(*) as song_name')
				 		  ->groupBy('artiste_id')
				 		  ->orderBy('artiste_id')
				 		  ->get();
        // $artisteProfiles = DB::table('artistes')
        //                     ->join('approves', 'artistes.id', '=', 'approves.artiste_id')
        //                     ->orderBy('artistes.artiste_name', 'ASC')
        //                     ->get(); 

    	return view('artisteprofile', compact('artisteProfiles'));
    }

    public function singleArtisteBio($slug)
    { 
        $view_data = [];

        try 
        {
            $view_data['artiste'] = $artiste = Artiste::whereSlug($slug)->first();
            $view_data['songs'] = Approve::whereArtisteId($artiste->id)->get();
            
            return view('singleartisteprofile', $view_data);
        } 
        catch (ModelNotFoundException $ex) 
        {
            return redirect()->back();
        }
    }

    // Work on this method to get a single song that belongs to an artiste and make the slug (url something like this (paul-femi/glorious-day))
    public function getSingleSong($slugName, $slugSong)
    {
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
            $result = ShareFacade::currentPage()->facebook();

            return view('singlesong', compact('singleSong', 'result'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect()->back();
        }
    }
}
