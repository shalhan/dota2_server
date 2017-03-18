<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Player;
use Session;
use Illuminate\Support\Facades\Input;

class PlayerController extends Controller
{
    public function viewPlayers(){
        $players = Player::get();
        return view('layouts.player', compact('players'));
    }
    
    public function viewLogin(){
        return view('login');
    }

    public function viewSignup(){
        return view('signup');
    }

    public function addPlayer(Request $r){
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

        Session::flash('success_adding','Adding player success!');

        return redirect('/player');
    }

    public function delPlayer($id){
        Player::where('PlayerID', $id)->delete();

        Session::flash('delete_player', 'Delete Player Success');

        return redirect()->back();
    }

    public function viewEditPlayer($id){
        $players = Player::where('PlayerID',$id)->first();
        return view('layouts.editPlayer', compact(['id','players']));
    }

    public function editPlayer(Request $r, $id){
        $player = Player::findOrFail($id);

        if(Input::get('Name') || Input::get('UserId') || Input::get('Email')){
            $player->update(Input::only('Name','UserId','Email'));
            Session::flash('success_edit', "Edit success!");
            return redirect('/player');
        }else{
            Session::flash('nothing_edited', "Nothing change!");
            return redirect('/player');    
        }
        
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
