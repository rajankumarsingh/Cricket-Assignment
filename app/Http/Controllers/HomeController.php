<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\Match;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(10);
  
        return view('front.teams.lists',compact('teams'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
	
	public function details($id)
    {
		$team = Team::find($id);
        return view('front.teams.details',compact('team'));
    }
	
	public function player_details($id)
    {
		$player = Player::find($id);
        return view('front.teams.playerdetails',compact('player'));
    }
	
	public function matches($id)
    {
		$team = Team::find($id);
        return view('front.teams.matches',compact('team'));
    }
}
