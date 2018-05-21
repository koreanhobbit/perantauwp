<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as ImageIv;
use App\Image;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Tag;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::orderBy('id', 'desc')->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if ($request->ajax() && $request->title == 'imagelink') {
            $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagelink');
            return view('admin.blog.partials._imageLink', compact('images'))->render();
        }

        if ($request->ajax() && $request->title == 'reloadImageLink') {
            $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagelink');
            return view('admin.blog.partials._imageLink', compact('images'))->render();
        }

        if ($request->ajax() && $request->title == 'reloadFeaturedImageContainer') {
            $images_fi = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.blog.partials._featuredImage', compact('images_fi'))->render();
        }

        if ($request->ajax() && $request->title == 'featuredimagepage') {
            $images_fi = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.blog.partials._featuredImage', compact('images_fi'))->render();
        }        

        $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagelink');

        $images_fi = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'featuredimagepage'); 

        return view('admin.blog.create', compact('images', 'images_fi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => ['required','min:2'],
            'slug' => ['required', 'alpha_dash', 'unique:blogs,slug'],
            'source' => ['nullable','url'],
            'description' => ['required'],
            'tag' => ['array'],
            'tag.*' => ['required','string','min:2'],
        ]);

        //modify the description and save the image
        $description = $request->description;
        
        //get the dom of tinymce
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    

        //take the dom for the image
        $imagesTag = $dom->getElementsByTagName('img');

        //take the dom for the <p>
        $pars = $dom->getElementsByTagName('p');

        $summary = "";

        foreach($pars as $par) {
            $words = $par->nodeValue;
            if($summary != '') {
                $summary = $summary . ' ' . $words;
            } 
            else {
                $summary = $summary . $words; 
            }
        }

        if(strlen($summary) > 100) {
            $stringcut = substr($summary, 0, 100);
            $summary = substr($stringcut, 0, strrpos($stringcut, ' ')) . '...';
        }

        //save to database
        $blog = Blog::addNewPost($request, $summary);

        //check tags if its in the database or not save to database
        if(count($request->tag) > 0) {
            foreach($request->tag as $tag) {
                $mark = false;
                foreach(Tag::all() as $tagDb) {
                    if($tag === $tagDb->name) {
                        $blog->tags()->attach($tagDb);
                        $mark = true;
                        break;
                    } 
                }
                if($mark === false) {
                    $blog->addTags($tag);
                }
            }
        }

       
        foreach($imagesTag as $imageTag){

            //get image attribute
            $data = $imageTag->getAttribute('src');

            $path_parts = pathinfo($data);

            $imageName = $path_parts['basename'];

            $image = Image::where('name', '=', $imageName)->first();

            if(!empty($image)) {
                $blog->images()->attach($image->first(), ['option' => 3, 'info' => 'tinymce']);
            } 
        }

        if(!empty($request->featuredImage)) {
            $featuredImage = Image::find($request->featuredImage);
            $blog->images()->attach($featuredImage, ['option' => 1, 'info' => 'featured image']);
        }

        session()->flash('flashmessage', 'Blog post successfully created');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return $blog;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blog $blog)
    {
        if ($request->ajax() && $request->title == 'imagelink') {
            $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagelink');
            return view('admin.blog.partials._imageLink', compact('images'))->render();
        }

        if ($request->ajax() && $request->title == 'reloadImageLink') {
            $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagelink');
            return view('admin.blog.partials._imageLink', compact('images'))->render();
        }

        if ($request->ajax() && $request->title == 'reloadFeaturedImageContainer') {
            $images_fi = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.blog.partials._featuredImage', compact('images_fi'))->render();
        }

        if ($request->ajax() && $request->title == 'featuredimagepage') {
            $images_fi = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.blog.partials._featuredImage', compact('images_fi'))->render();
        }        

        //mark if featured image exist or not in the blog post
        $featuredImageMark = false;
        
        if(!empty($blog->images()->wherePivot('option', 1)->first())) {
            $featuredImageMark = true;
        }

        //if there is featured image send the properties
        if($featuredImageMark == true) {
             $featuredImage = $blog->featuredImage($blog->id);              
        }
        else {
            $featuredImage = null;
        }

        $tags = $blog->tags()->get();

        $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagelink');

        $images_fi = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'featuredimagepage');

        return view('admin.blog.edit', compact('blog', 'images', 'featuredImageMark', 'tags', 'featuredImage', 'images_fi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //validation
        $this->validate($request, [
            'title' => ['required','min:2'],
            'slug' => ['required', 'alpha_dash', Rule::unique('blogs')->ignore($blog->id)],
            'source' => ['nullable','url'],
            'description' => ['required'],
            'tag' => ['array'],
            'tag.*' => ['required','string','min:2'],
        ]);

        //modify the description and save the image
        $description = $request->description;
        
        //get the dom of tinymce
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    

        //take the dom for the image
        $imagesTag = $dom->getElementsByTagName('img');

        //take the dom for the <p>
        $pars = $dom->getElementsByTagName('p');

        $summary = "";

        foreach($pars as $par) {
            $words = $par->nodeValue;
            if($summary != '') {
                $summary = $summary . ' ' . $words;
            } 
            else {
                $summary = $summary . $words; 
            }
        }

        if(strlen($summary) > 100) {
            $stringcut = substr($summary, 0, 100);
            $summary = substr($stringcut, 0, strrpos($stringcut, ' ')) . '...';
        }

        //save update
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->source = $request->source;
        $blog->summary = $summary;
        $blog->description = $request->description;
        $blog->save();

        //remove all tags
        if(count($blog->tags) > 0) {
            $blog->tags()->detach();
        }

        //check tags if its in the database or not save to database
        foreach($request->tag as $tag) {
            $mark = false;
            foreach(Tag::all() as $tagDb) {
                if($tag === $tagDb->name) {
                    $blog->tags()->attach($tagDb);
                    $mark = true;
                    break;
                } 
            }
            if($mark === false) {
                $blog->addTags($tag);
            }
        }

        //remove all images
        if(count($blog->images) > 0) {
            $blog->images()->detach();
        }
       
        foreach($imagesTag as $imageTag){

            //get image attribute
            $data = $imageTag->getAttribute('src');

            $path_parts = pathinfo($data);

            $imageName = $path_parts['basename'];

            $image = Image::where('name', '=', $imageName)->get();

            if(!empty($image->first())) {
                $blog->images()->attach($image->first(), ['option' => 3, 'info' => 'tinymce']);
            } 
        }

        if(!empty($request->featuredImage)) {
            $featuredImage = Image::find($request->featuredImage);
            $blog->images()->attach($featuredImage, ['option' => 1, 'info' => 'featured image']);
        }

        session()->flash('flashmessage', 'Blog post successfully updated');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->images()->detach();
        $blog->tags()->detach();
        $blog->delete();
        return redirect()->route('blog.index')->with('flashmessage', 'Post deleted successfully');        
    }
}
