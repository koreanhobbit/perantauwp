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

    public function thumbnailBgImage1() 
    {
    	return $thumbnailBgImage1 = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('themesettings', 'imageables.imageable_id', '=', 'themesettings.id')
            ->where('themesettings.id', '=', $this->id)
            ->where('imageables.option', '=', 6)
            ->first();
    }

    public function bgImage1()
    {
    	return $bgImage1 = DB::table('images')
    		->select('images.*')
    		->join('imageables', 'images.id', '=', 'imageables.image_id')
    		->join('themesettings', 'imageables.imageable_id', '=', 'themesettings.id')
    		->where('themesettings.id', '=', $this->id)
    		->where('imageables.option', '=', 6)
    		->first();
    }

    public function thumbnailBgImage2() 
    {
    	return $thumbnailBgImage2 = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('themesettings', 'imageables.imageable_id', '=', 'themesettings.id')
            ->where('themesettings.id', '=', $this->id)
            ->where('imageables.option', '=', 7)
            ->first();
    }

    public function bgImage2()
    {
    	return $bgImage2 = DB::table('images')
    		->select('images.*')
    		->join('imageables', 'images.id', '=', 'imageables.image_id')
    		->join('themesettings', 'imageables.imageable_id', '=', 'themesettings.id')
    		->where('themesettings.id', '=', $this->id)
    		->where('imageables.option', '=', 7)
    		->first();
    }
}
