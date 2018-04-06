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
        return $image = DB::table('images')
            ->select('images.id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('blogs', 'imageables.imageable_id', '=', 'blogs.id')
            ->where('blogs.id', '=', $id)
            ->where('imageables.option', '=', 1)
            ->first();
    }

    public function thumbnail($id)
    {
        return $thumbnail = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('blogs', 'imageables.imageable_id', '=', 'blogs.id')
            ->where('blogs.id', '=', $id)
            ->first();
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
