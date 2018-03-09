<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Model\Admin;


class AdminFrontController extends Controller
{

	public function getUpdatePassword()
    {
        return view('admin.updatepassword');
    }
    
    public function postUpdatePassword(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|confirmed',
        ]);

        $admin = Admin::find(Auth::guard('admin')->id());
        $passwordHashed = $admin->password;

        if(Hash::check($request->old, $passwordHashed))
        {
            $admin->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Password Succesfully changed!!!');

            return back();
        }

        $request->session()->flash('failure', 'Password was not changed!!!');

        return back();
    }
}
