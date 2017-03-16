<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use Session;

class MatchController extends Controller
{
    public function viewAllMatches(){
        $matches = Match::get();
        return view('layouts.match', compact('matches'));
    }

    public function createMatch(Request $r){
        $this->validate($r,[
            'MatchName' => 'required|min:8',
            'MatchType' => 'required',
            'Date' => 'required'
        ]);

        $date = date("Y-m-d", strtotime($r->input('Date')));

        $match = new Match([
            'MatchName' => $r->input('MatchName'),
            'MatchType' => $r->input('MatchType'),
            'Date' => $date
        ]);

        $match->save();

        Session::flash('createMatch', "You've successed adding a match!");
        return redirect('/match');
    }
}
