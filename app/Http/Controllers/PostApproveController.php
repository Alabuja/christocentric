<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudder;
use App\Model\Artiste;
use App\Model\Approve;
use App\Http\Requests;

class PostApproveController extends Controller
{
    public function postApprove(Request $request)
    {

        // list($width, $height) = getimagesize($song_image);

        // $fileUrl = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

        if($request->hasFile('song_image'))
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
	        $lyrics = $request->input('lyrics');
	        $song_image = $request->file('song_image')->getRealPath();

	        Cloudder::upload($song_image, null);
        
	        $getResult = Cloudder::getResult();

	        if($getResult)
	        {
	        	$approve = new Approve;
				$approve->artiste_id = $request->input('artiste_id');
		        $approve->song_name = $request->input('song_name');
		        $approve->download_link = $request->input('download_link');
		        $approve->lyrics = $request->input('lyrics');
		        $approve->save();

		        $request->session()->flash('success', 'New Song Approved succesfully!!!');
	 
	        	return back();
	        }


	    }
        //save to uploads directory
        //$image->move(public_path("uploads"), $name);


        //$this->saveImage($request, $fileUrl);


  //       $request->session()->flash('success', 'New Song Approved succesfully!!!');
 
  //       return back();


  //       $approve = new Approve;
		// $approve->artiste_id = $request->input('artiste_id');
  //       $approve->song_name = $request->input('song_name');
  //       $approve->download_link = $request->input('download_link');
  //       $approve->lyrics = $request->input('lyrics');
  //       $approve->save();
    }

    // private function saveImage(Request $request, $fileUrl)
    // {
    //     $approve = new Approve;
    //     $approve->song_image = $request->file('song_image')->getClientOriginalName();
    //     $approve->artiste_id = $request->input('artiste_id');
    //     $approve->song_name = $request->input('song_name');
    //     $approve->download_link = $request->input('download_link');
    //     $approve->lyrics = $request->input('lyrics');
    //     $approve->file_url = $fileUrl;

    //     $approve->save();
    // }
}
