<?php

namespace App\Http\Controllers;
use App\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request)
    {
    	$this->validation($request, [
    		'name' => ['required', 'min:2', 'unique:tags,name']
    	]);

    	Tag::create([
    		'name' => $request->name,
    	]);
    }
}
