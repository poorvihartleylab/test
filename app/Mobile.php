<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{	 protected $table = 'mobiles';

     public function user()
	{
	     return $this->belongsTo('App\User', 'user_id', 'id')->select(['mobile']);
	}
}
