<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThemeSetting extends Model
{
    protected $table = 'themesettings'; 

	public function setting()
	{
		return $this->hasOne('App\Setting');
	}

     public function images()
    {
    	return $this->morphToMany('App\Image', 'imageable')->withPivot('option','info')->withTimestamps();
    }

    public function backgrounds() 
    {
        return $this->belongsToMany('App\Background', 'background_themesetting', 'themesetting_id', 'background_id');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Color', 'color_themesetting', 'themesetting_id', 'color_id');
    }

    public function bgImage1()
    {
        return $this->images()->wherePivot('option',6)->first();
    }

    public function bgImage2()
    {
        return $this->images()->wherePivot('option',7)->first();
    }
}
