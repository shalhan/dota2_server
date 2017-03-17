<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Player;
use Session;

class PlayerController extends Controller
{
    public function viewPlayers(){
        return view('layouts.player');
    }

    public function addPlayer(Request $r){

    }
    
    public function viewLogin(){
        return view('login');
    }

    public function viewSignup(){
        return view('signup');
    }

    public function postSignup(Request $r){
        $this->validate($r,[
            'Name' => 'required|min:6',
            'UserId' => 'required|unique:players|min:4',
            'Email' => 'required|unique:players',
            'Password' => 'required|min:4|max:23'
        ]);

        $profile = new Player([
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

        
        if(Auth::guard('player')->attempt($credential)) {
            $player = Auth::guard('player')->user();
            $this->getSession($player);
            return redirect('/player');
        }else{
            Session::flash('error', 'Username or password is incorect');
            return redirect('/');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flush();

        return redirect('/');
    }

    private function getSession($profile){
        Session::put('name',$profile->Name);
    }
}
