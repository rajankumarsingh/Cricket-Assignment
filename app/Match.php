<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'scheduledDate', 'teamA', 'teamB', 'teamApoints', 'teamBpoints', 'winner',
    ];
	
	public function teamAD()
    {
       return $this->belongsTo('App\Team','teamA');
	}
	public function teamBD()
    {
       return $this->belongsTo('App\Team','teamB');
	}
	public function winnerD()
    {
       return $this->belongsTo('App\Team','winner');
	}
}
