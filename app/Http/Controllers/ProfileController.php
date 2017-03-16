<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Session;

class ProfileController extends Controller
{
    public function viewLogin(){
        return view('login');
    }

    public function viewSignup(){
        return view('signup');
    }

    public function postSignup(Request $r){
        $this->validate($r,[
            'Name' => 'required|min:6',
            'UserId' => 'required|unique:profiles|min:6',
            'Email' => 'required|unique:profiles',
            'Password' => 'required|min:6|max:23'
        ]);

        $profile = new Profile([
            'Name' => $r->input('Name'),
            'UserId' => $r->input('UserId'),
            'Email' => $r->input('Email'),
            'Password' => bcrypt($r->input('Password')),
        ]);

        $profile->save();

        Session::flash('thanks','Thanks for signing up!');

        return redirect('/');
    }
}
