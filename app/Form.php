<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
	protected $guarded = [];

	public static function addNewForm($request)
	{
		return static::create([
			'name' => trim($request->name),
		]);
	}

	public function formParts()
	{
		return $this->belongsToMany('App\FormPart', 'form_form_part');
	}

    public function formItems()
    {
    	return $this->hasMany('App\FormItem');
    }
}
