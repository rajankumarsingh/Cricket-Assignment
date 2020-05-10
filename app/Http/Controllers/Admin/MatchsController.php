<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Match;
use Illuminate\Http\Request;
use App\Team;

class MatchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::latest()->paginate(5);
  
        return view('admin.matches.index',compact('matches'))
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
        return view('admin.matches.create', compact('teams'));
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
            'scheduledDate' => 'required',
			'teamA' => 'required',
			'teamB' => 'required',
        ]);

        Match::create($request->all());   
        return redirect()->route('admin.matches.index')
                        ->with('success','Matches created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        return view('admin.matches.show',compact('match'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        $teams = Team::pluck('name', 'id');
        return view('admin.matches.edit',compact('match','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        $request->validate([
            'scheduledDate' => 'required',
			'teamA' => 'required',
			'teamB' => 'required',
        ]);
		//dd($request->all());
        $match->update($request->all());
  
        return redirect()->route('admin.matches.index')
                        ->with('success','Match updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        $match->delete();  
        return redirect()->route('admin.matches.index')
                        ->with('success','Match deleted successfully');
    }
}
