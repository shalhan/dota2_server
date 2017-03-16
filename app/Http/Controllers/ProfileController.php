<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Session;
use Auth;
use Hash;
use Validator;
use Illuminate\Support\Facades\Input;

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
            'UserId' => 'required|unique:profiles|min:4',
            'Email' => 'required|unique:profiles',
            'Password' => 'required|min:4|max:23'
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

    public function postLogin(Request $r){
          
    
        $credential = array(
            'UserId' => $r->input('UserId'),
            'password' => $r->input('Password')
        );

        
        if(Auth::guard('profile')->attempt($credential)) {
            return redirect('/dashboard');
        }else{
            Session::flash('error', 'Username or password is incorect');
            return redirect('/');
        }
    }
}
