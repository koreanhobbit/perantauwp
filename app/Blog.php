<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $guarded = [];

    public function images() 
    {
    	return $this->morphToMany('App\Image', 'imageable')->withPivot('option', 'info')->withTimestamps();
    }

    public function getRouteKeyName() 
    {
    	return 'slug';
    }

    public static function addNewPost($request, $summary) 
    {
        return static::create([
            'title' => trim($request->title),
            'slug' => $request->slug,
            'source' => $request->source,
            'summary' => $summary,
            'description' => $request->description,
        ]);
    }

    public function featuredImage($id)
    {
        return $this->images()->wherePivot('option', 1)->first();
    }

    public function tags() 
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function addTags($tag)
    {
        $this->tags()->create([
            'name' => $tag,
        ]);
    }
}
