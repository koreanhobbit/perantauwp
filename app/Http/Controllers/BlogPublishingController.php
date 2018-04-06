<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogPublishingController extends Controller
{
    public function index(Request $request, Blog $blog)
    {
		//change status published or not published
	    if($request->ajax()) {
	        if($blog->is_published == 0) {
	            $blog->is_published = 1;
	            $blog->save();
	            $status = 'published';
	        }
	        else {
	            $blog->is_published = 0;
	            $blog->save();
	            $status = 'unpublished';
	        }
	        $title = $blog->title;
	        session()->flash('flashmessage', 'The post ' . $title . ' was ' . $status);
	    }
    }
}
