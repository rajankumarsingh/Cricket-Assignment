<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'clubState'
    ];
	
	public function players()
    {
        return $this->hasMany('App\Player', 'teamId' );
    }
	
	public function matches()
    {
        return $this->hasMany('App\Match', 'teamA' );
    }
}
