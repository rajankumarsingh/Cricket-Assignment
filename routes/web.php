<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
	Route::get('/', function () { return view('admin.welcome'); });
	Route::resource('teams', 'TeamsController');
	Route::resource('players', 'PlayersController');
	Route::resource('matches', 'MatchsController');
});

Route::get('/', 'HomeController@index');	
Route::get('team-details/{id}', 'HomeController@details')->name('team.details');
Route::get('player-details/{id}', 'HomeController@player_details')->name('player.details');

Route::get('team-matches/{id}', 'HomeController@matches')->name('team.matches');