<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\MatchPlayer;
use App\Match;

class MatchPlayerController extends Controller
{   
    public function viewAllMatches(){
        $match = Match::get();
        // $matchPlay = array();
        // $i = 0;
        // $j = 0;
        // foreach($match as $m){
        //     // echo $m->MatchName . "<br>";
        //     $matchPlay[$m->MatchName][$m->Date][$i]=null;
        //     $matchPlayers = MatchPlayer::where('MatchID',$m->MatchID)->get();
        //     foreach($matchPlayers as $mp){

        //         $matchPlay[$m->MatchName][$m->Date][$i] = $mp->player->Name;
        //         $i++;
        //         // echo $mp->player->Name . "<br>";
        //     }
        //     $i=0;
        // }

        // echo count($matchPlay);
        // $length = count($matchPlay);
        // for($i=0;$i<$length;$i++){
        //     echo array_keys($matchPlay['OG vs Newbee']);
        //     foreach($matchPlay[$i] as $m){
        //         echo $m;
        //     }
        //     echo "<br>";
        // }
        // echo count($matchPlay[1]);
        // echo $matchPlay[0][5];
        // print_r($matchPlay);
        // foreach($matchPlayers as $m){
        //     echo $m->match->MatchName;
        // }
        // print_r($matchesPlayer);
        return view('layouts.match', compact('match'));
    }

    public function viewAddMatchPlayers($id){
        $players = Player::get();
        return view('layouts.addMatchPlayer', compact('id','players'));
    }

    public function addMatchPlayers($id, Request $r){
        $this->validate($r,[
            'player' => 'required'
        ]);

        $players = $r->input('player');
        foreach($players as $p){

            $matchPlayer = new MatchPlayer([
                'MatchID' => $id,
                'PlayerID' => $p
            ]);

            $matchPlayer->save();
        }

        return redirect('match');
    }
}
