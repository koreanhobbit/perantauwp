<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $guarded = [];

    public static function addNewPermission($request)
    {
    	return static::create([
    		'name' => $request->name,
    		'display_name' => $request->displayName,
    		'description' => $request->description,
    	]);
    }
}
