<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $guarded = [];

    public function areas()
    {
    	return $this->hasMany('App\Area', 'country_id');
    }

    public static function addNewCountry($request)
    {
    	return static::create([
    		'name' => $request->countryName,
    		'slug' => $request->countrySlug,
    		'created_at' => new \DateTime(),
    		'updated_at' => new \DateTime(),
    	]);
    }
}
