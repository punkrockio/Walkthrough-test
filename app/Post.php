<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    public $timestamps = false;

    
    public function authour()
    {
    	// $authour = User::find($this->author_id);
    	// return $authour;

    	return $this->belongsTo('App\User', 'author_id');
    }


}
