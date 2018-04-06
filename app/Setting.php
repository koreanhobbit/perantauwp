<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Setting extends Model
{
    public function themesetting()
    {
        return $this->belongsTo('App\ThemeSetting');
    }

    public function themeColor() 
    {
        return $this->belongsTo('App\Color', 'color_id');
    }

    public function themeBackground()
    {
        return $this->belongsTo('App\Background', 'background_id');
    }

    public function images()
    {
    	return $this->morphToMany('App\Image', 'imageable')->withPivot('option','info')->withTimestamps();
    }

    public function thumbnailLogo() 
    {
    	return $thumbnail = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('settings', 'imageables.imageable_id', '=', 'settings.id')
            ->where('settings.id', '=', $this->id)
            ->where('imageables.option', '=', 4)
            ->first();
    }

    public function logoImage()
    {
    	return $logoImage = DB::table('images')
    		->select('images.*')
    		->join('imageables', 'images.id', '=', 'imageables.image_id')
    		->join('settings', 'imageables.imageable_id', '=', 'settings.id')
    		->where('settings.id', '=', $this->id)
    		->where('imageables.option', '=', 4)
    		->first();
    }

    public function thumbnailIcon() 
    {
        return $thumbnail = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('settings', 'imageables.imageable_id', '=', 'settings.id')
            ->where('settings.id', '=', $this->id)
            ->where('imageables.option', '=', 5)
            ->first();
    }

    public function iconImage()
    {
        return $logoImage = DB::table('images')
            ->select('images.*')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('settings', 'imageables.imageable_id', '=', 'settings.id')
            ->where('settings.id', '=', $this->id)
            ->where('imageables.option', '=', 5)
            ->first();
    }
}
