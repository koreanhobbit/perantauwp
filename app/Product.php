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

    public function featuredImage() 
    {
    	return $this->images()->wherePivot('option', 1)->first();
    }

    public function galleryImage() 
    {
    	return $this->images()->wherePivot('option', 2)->get();
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
