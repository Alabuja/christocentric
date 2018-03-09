<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Artiste;
use App\Model\Song;
use App\Model\Approve;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;
use Cloudder;
use Purifier;

class ApproveController extends Controller
{
    public function getApprove()
    { 
    	$approveArtiste = [
    		'approveartiste' => Artiste::all(),
    	];
    	return view('admin.approveartiste', $approveArtiste);
    }

    public function getSubmission()
    {
    	$approveSubmission = [
    		'approvesubmission' => Approve::all(),
    		'approvesubmission' => Approve::paginate(10),
    	];
    	return view('admin.approvesubmission', $approveSubmission);
    }

    public function postApprove(Request $request)
    {

        $this->validate($request, [
            'artiste_id' => 'required|numeric',
            'song_name' => 'required',
            'download_link' => 'required',
            'lyrics' => 'required',
            'song_image' => 'required|mimes:jpeg,jpg,png|between:1,10000',
        ]);

        $artiste_id = $request->input('artiste_id');
        $song_name = $request->input('song_name');
        $download_link = $request->input('download_link');
        $lyrics = Purifier::clean($request->input('lyrics'));
        $song_image = $request->file('song_image')->getRealPath();

        Cloudder::upload($song_image, null);
        list($width, $height) = getimagesize($song_image);

        $fileUrl = Cloudder::show(Cloudder::getPublicId(), [
            "crop" => "fit", "width" => 200, "height" => 200
        ]);

        $this->saveImage($request, $fileUrl);


        $request->session()->flash('success', 'New Song Approved succesfully!!!');
 
        return back();
    }

    private function saveImage(Request $request, $fileUrl)
    {
        $approve = new Approve;
        $approve->song_image = $request->file('song_image')->getClientOriginalName();
        $approve->artiste_id = $request->artiste_id;
        $approve->song_name = $request->song_name;
        $approve->download_link = $request->download_link;
        $approve->lyrics = Purifier::clean($request->lyrics);
        $approve->file_url = $fileUrl;

        $approve->save();
    }
}
