<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images() 
    {
    	return $this->morphToMany('App\Image', 'imageable')->withPivot('option', 'info')->withTimestamps();
    }

    public function category() 
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id');
    }

    public function noImageThumb()
    {
    	 return $noThumbnail = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->where('images.id', '=', 1)
            ->first();
    }

    public function thumbnail()
    {
        return $thumbnail = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('products', 'imageables.imageable_id', '=', 'products.id')
            ->where('products.id', '=', $this->id)
            ->first();
    }

    public function thumbnailFeaturedImage()
    {
        return $thumbnail = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('products', 'imageables.imageable_id', '=', 'products.id')
            ->where('products.id', '=', $this->id)
            ->where('imageables.option', '=', 1)
            ->first();
    }

    public function featuredImage() 
    {
    	return $fm = DB::table('images')
    		->select('images.*')
    		->join('imageables', 'images.id', '=', 'imageables.image_id')
    		->join('products', 'imageables.imageable_id', '=', 'products.id')
    		->where('products.id', '=', $this->id)
    		->where('imageables.option', '=', 1)
    		->first();
    }

    public function galleryImage() 
    {
    	return $fm = DB::table('images')
    		->select('images.*')
    		->join('imageables', 'images.id', '=', 'imageables.image_id')
    		->join('products', 'imageables.imageable_id', '=', 'products.id')
    		->where('products.id', '=', $this->id)
    		->where('imageables.option', '=', 2)
            ->get()
    		->toArray();
    }

    public function thumbnailGalleryImage()
    {
        return $thumbnail = DB::table('thumbnails')
            ->select('thumbnails.name', 'thumbnails.location')
            ->join('images', 'images.id', '=', 'thumbnails.image_id')
            ->join('imageables', 'images.id', '=', 'imageables.image_id')
            ->join('products', 'imageables.imageable_id', '=', 'products.id')
            ->where('products.id', '=', $this->id)
            ->where('.imageables.option', '=', 2)
            ->get()
            ->toArray();
    }

    public static function addNewProduct($request, $summary) {
        return static::create([
            'name' => trim($request->name),
            'slug' => $request->slug,
            'price' => $request->price,
            'summary' => $summary,
            'description' => $request->description,
            'is_sale' => $request->is_sale,
            'sale_price' => $request->sale_price,
            'start_sale' => $request->startdate,
            'end_sale' => $request->enddate,
            'product_category_id' => $request->category,
        ]);
    }
}
