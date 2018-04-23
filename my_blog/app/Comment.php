<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'name', 'email', 'comment'];

    public function comment() 
    {
    	return $this->hasMany('App\Post');
    }
}
