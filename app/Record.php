<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
	protected $table = "records";
	
    protected $fillable = [
        'text', 
        'hash', 
        'ip',
        'state',
        'user_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
