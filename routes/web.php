<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Player

Route::group(['middleware' => 'nonauth'], function(){
    Route::get('/', [
        'uses' => 'PlayerController@viewLogin',
        'as' => 'login'
    ]);
    Route::post('/login',[
        'uses' => 'PlayerController@postLogin',
        'as' => 'login'
    ]);
   
});

Route::post('/addPlayer', [
    'uses' => 'PlayerController@addPlayer',
    'as' => 'addPlayer'
]);

Route::group(['middleware' => 'player'], function(){
    Route::get('/player',[
        'uses' => 'PlayerController@viewPlayers',
        'as' => 'player'
    ]);

    Route::get('/delPlayer={id}',[
        'uses' => 'PlayerController@delPlayer',
        'as' => 'delPlayer'
    ]);

    Route::get('/editPlayer={id}',[
        'uses' => 'PlayerController@viewEditPlayer',
        'as' => 'editPlayer'
    ]);

    Route::post('/editPlayer={id}',[
        'uses' => 'PlayerController@editPlayer',
        'as' => 'editPlayer'
    ]);

    //Match
    Route::post('/createMatch',[
        'uses' => 'MatchController@createMatch',
        'as' => 'createMatch'
    ]);

    //MatchPlayer
    Route::get('/match',[
        'uses' => 'MatchPlayerController@viewAllMatches',
        'as' => 'match'
    ]);

    Route::get('/match={id}',[
        'uses' => 'MatchPlayerController@viewAddMatchPlayers',
        'as' => 'addMatchPlayer'
    ]);

    Route::post('/match={id}/add',[
        'uses' => 'MatchPlayerController@addMatchPlayers',
        'as' => 'addMatchPlayer'
    ]);

    Route::get('/matchPlayer={id}',[
        'uses' => 'MatchPlayerController@delMatchPlayers',
        'as' => 'delMatchPlayer'
    ]);
     Route::get('/logout',[
        'uses' => 'PlayerController@logout',
        'as' => 'logout'
    ]);
});





