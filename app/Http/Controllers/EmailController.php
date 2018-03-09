<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Mail\SubmitSongMail;
use Mail;

class EmailController extends Controller
{
    
    public function getSubmitSong()
    {
    	return view('addlyrics');
    }

    public function sendMail(Request $request)
    {
    	$this->validate($request, [
    		'fullname' => 'required',
    		'email' => '',
    		'phone_number' => '',
    		'twitter_name' => '',
    		'facebook_name' => '',
    		'song_title' => 'required',
    		'artiste_name' => 'required',
    		'download_link' => 'required',
    		'lyrics' => '',
    	]);

    	$sendItems = [];
    	$sendItems['fullname'] = $request->input('fullname');
    	$sendItems['email'] = $request->input('email');
    	$sendItems['phone_number'] = $request->input('phone_number');
    	$sendItems['twitter_name'] = $request->input('twitter_name');
    	$sendItems['facebook_name'] = $request->input('facebook_name');
    	$sendItems['song_title'] = $request->input('song_title');
    	$sendItems['artiste_name'] = $request->input('artiste_name');
    	$sendItems['download_link'] = $request->input('download_link');
    	$sendItems['lyrics'] = $request->input('lyrics');

    	Mail::to('songs@christocentriclyrics.com.ng')->send(new SubmitSongMail($sendItems));

    	$request->session()->flash('success', 'Song has been sent!!!');
        return back();
    }
}
