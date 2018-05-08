<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];

    public static function addNewPartner($request)
    {
    	return static::create([
    		'name' => trim($request->name),
    		'link' => $request->link,
    		'setting_id' => 1,
    	]);
    }

    public function images()
    {
    	return $this->morphToMany('App\Image', 'imageable')->withPivot('option', 'info')->withTimestamps();
    }
}
