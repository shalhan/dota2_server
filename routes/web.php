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
Route::get('/', [
    'uses' => 'PlayerController@viewLogin',
    'as' => 'login'
]);

Route::get('/sign_up', [
    'uses' => 'PlayerController@viewSignup',
    'as' => 'signup'
]);

Route::post('/sign_up', [
    'uses' => 'PlayerController@postSignup',
    'as' => 'signup'
]);

Route::post('/login',[
    'uses' => 'PlayerController@postLogin',
    'as' => 'login'
]);

Route::get('/logout',[
    'uses' => 'PlayerController@logout',
    'as' => 'logout'
]);

Route::get('/player',[
    'uses' => 'PlayerController@viewPlayers',
    'as' => 'player'
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
    'as' => 'addPlayer'
]);

Route::get('/matchPlayer={id}',[
    'uses' => 'MatchPlayerController@delMatchPlayers',
    'as' => 'delPlayer'
]);
