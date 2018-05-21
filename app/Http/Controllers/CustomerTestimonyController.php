<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerTestimonyController extends Controller
{
    public function index() {
    	return view('admin_customer.testimony.index');
    }

    public function create() {
    	return view('admin_customer.testimony.create');
    }

    public function store() {
    	//
    }
}
