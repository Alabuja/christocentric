<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Model\Song;
use Validator;
use User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newsong');
    }

    public function getUpdatePassword()
    {
        return view('updatepassword');
    }

    public function newSong()
    {
        return view('newsong');
    }

    public function submitSong(Request $request)
    {
        $rules = array(
            'song_title' => 'required',
            'artiste_name' => 'required',
            'lyrics' => '',
            'download_link' => 'required|url',
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            $messages = $validator->messages();
            return redirect()->back()->withErrors($messages)->withInput();
        }
        else
        {
            $songs = new Song;

            $songs->user_id  = Auth::user()->id;
            $songs->song_title = $request->input('song_title');
            $songs->artiste_name = $request->input('artiste_name');
            $songs->lyrics = $request->input('lyrics');
            $songs->download_link = $request->input('download_link');

            $songs->save();

            $request->session()->flash('success', 'You just added a new Song!!!');
            return back();

        }
    }

    public function postUpdatePassword(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::find(Auth::id());
        $hashedPassword = $user->password;


        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
 
            $request->session()->flash('success', 'Your password has been changed.');
 
            return back();
        }
 
        $request->session()->flash('failure', 'Your password has not been changed.');
 
        return back();
    }
}
