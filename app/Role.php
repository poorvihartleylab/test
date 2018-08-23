<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
	{
	    return $this->belongsTo('App\User', 'role_id', 'id')->select(['role_name']);
	}

}
