<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $guarded = [];

	public function forms()
	{
		return $this->morphToMany('App\Form', 'formable');
	}

    public static function addNewService($request)
    {
    	return static::create([
    		'name' => trim($request->name),
    		'icon' => trim($request->icon),
    		'type' => $request->type,
    		'short_desc' => $request->shortdesc,
    		'description' => $request->description,
    	]);
    }
}
