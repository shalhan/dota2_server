<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\MatchPlayer;
use App\Match;
use Session;

class MatchPlayerController extends Controller
{   
    public function viewAllMatches(){
        $match = Match::get();
  
        return view('layouts.match', compact('match'));
    }

    public function viewAddMatchPlayers($id){
        $playerId = array();
        $matchPlayer = MatchPlayer::where('MatchID',$id)->get();
        
        foreach($matchPlayer as $mp){
            array_push($playerId, $mp->PlayerID);
        }

        $playerId = array_unique($playerId);

        $players = Player::whereNotIn('PlayerID', $playerId)->get();
        
        
        return view('layouts.addMatchPlayer', compact('id','players'));
    }

    public function addMatchPlayers($id, Request $r){
        $this->validate($r,[
            'player' => 'required'
        ]);

        $countMatch = MatchPlayer::where('MatchID', $id)->count() + count($id);
        if($countMatch<=10){
             $players = $r->input('player');
            foreach($players as $p){

                $matchPlayer = new MatchPlayer([
                    'MatchID' => $id,
                    'PlayerID' => $p
                ]);

             $matchPlayer->save();
            }

            return redirect('match');
        }else{
            Session::flash('reach_limit', 'Player has reached a limit (Max : 10 players)');
            // echo Session::get('reach_limit');
            return redirect('match=' . $id);
        }
    }

    public function delMatchPlayers($id){
        MatchPlayer::where('MatchPlayerID',$id)->delete();

        return redirect()->back();
    }
}
