<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimony;
use App\User;

class CustomerTestimonyController extends Controller
{
    public function index(User $user) {
        $testimonies = $user->testimonies()->orderBy('id', 'desc')->get();
    	return view('admin_customer.testimony.index', compact('testimonies'));
    }

    public function create() {
    	return view('admin_customer.testimony.create');
    }

    public function store(User $user, Request $request) {
    	$this->validate($request, [
    		'testimony' => 'required|string|min:2',
    	]);

 		//add to database
 		$testimony = Testimony::addNewTestimony($request, $user);

 		return redirect()->route('customer.testimony.index', ['user' => $user->id, 'name' => $user->name])->with('flashmessage', 'Testimony was succesfully created!');
    }
}
