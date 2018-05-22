<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
	protected $guarded = [];

    public static function addNewRole($request) 
    {
    	return static::create([
    		'name' => $request->name,
    		'display_name' => $request->displayName,
    		'description' => $request->description,
    	]);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id')->withPivot('user_type');
    }

    public function permissions()
    {
    	return $this->belongsToMany('App\Permission', 'permission_role', 'role_id', 'permission_id');
    }
}
