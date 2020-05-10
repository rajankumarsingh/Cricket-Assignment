<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;
use App\Team;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::latest()->paginate(5);
  
        return view('admin.players.index',compact('players'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$teams = Team::pluck('name', 'id');
        return view('admin.players.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
			'lastName' => 'required',
			'jerseyNumber' => 'required',
			'country' => 'required',
            'teamId' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]); 
		$player = new Player($request->input()) ;
		if($file = $request->hasFile('pic'))
		{  
            $file = $request->file('pic') ;            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path('uploads/players');
            $file->move($destinationPath,$fileName);
            $player->imageUri = 'uploads/players/'.$fileName ;
        }		
		$player->save(); 
        return redirect()->route('admin.players.index')
                        ->with('success','Player created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('admin.players.show',compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
		$teams = Team::pluck('name', 'id');
        return view('admin.players.edit',compact('player','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'firstName' => 'required',
			'lastName' => 'required',
			'jerseyNumber' => 'required',
			'country' => 'required',
            'teamId' => 'required',
        ]);
		//dd($request->all());
		
		if($file = $request->hasFile('pic'))
		{  
            $file = $request->file('pic') ;            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path('uploads/players');
            $file->move($destinationPath,$fileName);
            $player->imageUri = 'uploads/players/'.$fileName ;
        }		
		$player->save();  
        return redirect()->route('admin.players.index')
                        ->with('success','Player updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();  
        return redirect()->route('admin.players.index')
                        ->with('success','Player deleted successfully');
    }
}
