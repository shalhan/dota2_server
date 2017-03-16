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

Route::get('/', [
    'uses' => 'ProfileController@viewLogin',
    'as' => 'login'
]);

Route::get('/sign_up', [
    'uses' => 'ProfileController@viewSignup',
    'as' => 'signup'
]);

Route::post('/sign_up', [
    'uses' => 'ProfileController@postSignup',
    'as' => 'signup'
]);

Route::post('/login',[
    'uses' => 'ProfileController@postLogin',
    'as' => 'login'
]);

Route::get('/dashboard',[
    'uses' => 'MatchController@viewAllMatch',
    'as' => 'dashboard'
]);