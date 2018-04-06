<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $guarded = [];

    public function thumbnail() {
    	return $this->hasOne('App\Thumbnail');
    }

    public function author() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
