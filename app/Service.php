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

    public function points()
    {
        return $this->hasMany('App\ServicePoint', 'service_id');
    }

    public function fare()
    {
        return $this->hasOne('App\ServiceFare', 'service_id');
    }

    public static function addNewService($request)
    {
    	return static::create([
    		'name' => trim($request->name),
    		'icon' => trim($request->icon),
    		'type' => $request->type,
    		'short_desc' => $request->shortdesc,
    		'description' => $request->description,
            'highlight' => $request->highlight,
    	]);
    }

    public static function getSpecial()
    {
        return static::where('type', '=', 1)->first();
    }

    public static function getOneService()
    {
        return static::first();
    }
}
