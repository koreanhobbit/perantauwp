<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimonies';

    protected $guarded = [];

    public static function addNewTestimony($request, $user)
    {
    	return static::create([
    		'testimony' => $request->testimony,
    		'user_id' => $user->id,
    	]);
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
