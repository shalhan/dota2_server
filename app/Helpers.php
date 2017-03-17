<?php

use App\MatchPlayer;

function getPlayer($id){
    $players = array();
    $matchPlayers = MatchPlayer::where('MatchID', $id)->get();
        foreach($matchPlayers as $mp){
            $players[$mp->MatchPlayerID]= $mp->player->Name; 
    }

    return $players;
}


?>