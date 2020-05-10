<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	protected $fillable = [
        'teamId', 'firstName', 'lastName', 'imageUri', 'jerseyNumber', 'country', 'history'
    ];
    public function team()
    {
       return $this->belongsTo('App\Team','teamId');
	}
}
