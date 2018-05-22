<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class TestimonyController extends Controller
{
    public function index()
    {
    	return view('admin.testimony.index');
    }

    public function manage(Request $request)
    {
    	if($request->ajax() && $request->title == 'reloadUsers') {
			$users = Role::find($request->role)->users()->with('testimonies')->paginate(1);  
			return view('admin.testimony.partial._manage', compact('users'))->render();
    	}

    	// $users = Role::find(7)->users()->with('testimonies')->get();

    	$roles = Role::orderBy('id', 'desc')->get();
    	return view('admin.testimony.manage', compact('roles'));
    }
}
