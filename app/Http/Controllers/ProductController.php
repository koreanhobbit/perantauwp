<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if($request->ajax()  && $request->title == 'reloadFeaturedImageContainer') {
            $images_fi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.product.partials._featuredImage', compact('images_fi'))->render();
        }

        if($request->ajax()  && $request->title == 'reloadGalleryImageContainer') {
            $images_gi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'galleryimagepage');
            return view('admin.product.partials._galleryImages', compact('images_gi'))->render();
        }

        if ($request->ajax() && $request->title == 'reloadImageLink') {
            $images = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'imagelinkpage');
            return view('admin.product.partials._imageLink', compact('images'))->render();
        }

        if ($request->ajax() && $request->title == 'featuredimagepage') {
            $images_fi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.product.partials._featuredImage', compact('images_fi'))->render();
        }

        if ($request->ajax() && $request->title == 'galleryimagepage') {
            $images_gi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'galleryimagepage');
            return view('admin.product.partials._galleryImages', compact('images_gi'))->render();
        }

        if ($request->ajax() && $request->title == 'imagelinkpage') {
            $images = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'imagelinkpage');
            return view('admin.product.partials._imageLink', compact('images'))->render();
        }

        $categories = ProductCategory::orderBy('Name', 'asc')->get();
        $images = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'imagelinkpage');

        $images_fi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'featuredimagepage');

        $images_gi = Image::orderBy('id', 'desc')->where('id','<>', 1)->paginate(12,['*'], 'galleryimagepage');
        
        return view('admin.product.create', compact('images', 'categories', 'images_fi', 'images_gi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->is_sale == '1') {
            $this->validate($request, [
                'sale_price' => ['required','integer'],
            ]);
        }

        $this->validate($request, [
            'name' => ['required', 'min:2'],
            'slug' => ['required', 'alpha_dash' ,'unique:products,slug'],
            'price' => ['required','between:0,9999999999,99'],
            'description' => ['required'],
            'category' => ['required', 'integer'],
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
        $product = Product::addNewProduct($request, $summary);

        foreach($imagesTag as $imageTag) {
            //get image attribute
            $data = $imageTag->getAttribute('src');

            $path_parts = pathinfo($data);

            $imageName = $path_parts['basename'];

            $image = Image::where('name', '=', $imageName)->first();

            if(!empty($image)) {
                $product->images()->attach($image, ['option' => 3, 'info' => 'tinymce']);
            }
        }

        if(!empty($request->featuredImage)) {
            $featuredImage = Image::find($request->featuredImage);
            $product->images()->attach($featuredImage, ['option' => 1, 'info' => 'featured image']);
        }

        if(count($request->galleryimage) > 0) {
            foreach($request->galleryimage as $item) {
                $gallery = Image::find($item);
                $product->images()->attach($gallery, ['option' => 2, 'info' => 'gallery image']);
            }
        }

        return redirect()->route('product.index')->with('flashmessage', 'New product was created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        if($request->ajax()  && $request->title == 'reloadFeaturedImageContainer') {
            $images_fi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.product.partials._featuredImage', compact('images_fi'))->render();
        }

        if($request->ajax()  && $request->title == 'reloadGalleryImageContainer') {
            $images_gi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'galleryimagepage');
            return view('admin.product.partials._galleryImages', compact('images_gi'))->render();
        }

        if ($request->ajax() && $request->title == 'reloadImageLink') {
            $images = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'imagelinkpage');
            return view('admin.product.partials._imageLink', compact('images'))->render();
        }

        if ($request->ajax() && $request->title == 'featuredimagepage') {
            $images_fi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'featuredimagepage');
            return view('admin.product.partials._featuredImage', compact('images_fi'))->render();
        }

        if ($request->ajax() && $request->title == 'galleryimagepage') {
            $images_gi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'galleryimagepage');
            return view('admin.product.partials._galleryImages', compact('images_gi'))->render();
        }

        if ($request->ajax() && $request->title == 'imagelinkpage') {
            $images = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'imagelinkpage');
            return view('admin.product.partials._imageLink', compact('images'))->render();
        }

        //mark if featured image exist or not in the product
        $featuredImageMark = false;
        foreach($product->images as $image) {
            //dd($image->pivot->option);
            if($image->pivot->option === 1) {
                $featuredImageMark = true;
                break;
            }
        }

        //if there is featured image send the properties
        if($featuredImageMark) {
             $thumbnailFi = $product->thumbnailFeaturedImage();
             $featuredImage = $product->featuredImage();              
        }
        else {
            $thumbnailFi = null;
            $featuredImage = null;
        }

        //mark if gallery image exist or not in the product
        $galleryImageMark = false;
        foreach($product->images as $image) {
            if($image->pivot->option === 2) {
                $galleryImageMark = true;
                break;
            }
            
        } 

        //if there is gallery image send the properties
        if($galleryImageMark) {
            $thumbnailGis = $product->thumbnailGalleryImage();
            $galleryImages =$product->galleryImage();
        }
        else {
            $thumbnailGis = null;
            $galleryImages = null;
        }

        $categories = ProductCategory::orderBy('Name', 'asc')->get();
        $images = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'imagelinkpage');

        $images_fi = Image::orderBy('id', 'desc')->where('id', '<>', 1)->paginate(12, ['*'], 'featuredimagepage');

        $images_gi = Image::orderBy('id', 'desc')->where('id','<>', 1)->paginate(12,['*'], 'galleryimagepage');
        
        return view('admin.product.edit', compact('images', 'categories', 'images_fi', 'images_gi', 'product', 'featuredImageMark', 'thumbnailFi', 'featuredImage', 'thumbnailGis', 'galleryImages', 'galleryImageMark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->is_sale == '1') {
            $this->validate($request, [
                'sale_price' => ['required','integer'],
            ]);
        }

        $this->validate($request, [
            'name' => ['required', 'min:2'],
            'slug' => ['required', 'alpha_dash', Rule::unique('products')->ignore($product->id)],
            'price' => ['required','between:0,9999999999,99'],
            'description' => ['required'],
            'category' => ['required', 'integer'],
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

        //#####save to database#####//
        $product->name = $request->name;
        $product->slug = $request->slug;

        //if there is changing in the price save the old price
        if($product->price != $request->price) {
            $product->old_price = $product->price;
            $product->price = $request->price;
        }
        else{
            $product->price = $request->price;
        }

        $product->description = $request->description;
        $product->summary = $summary;
        $product->is_sale = $request->is_sale;
        $product_category_id = $request->category;
        if($request->is_sale == '1') {
            $product->sale_price = $request->sale_price;
            $product->start_sale = $request->startdate;
            $product->end_sale = $request->enddate;
        }
        $product->save();

        //detach all the images
        if(count($product->images) > 0) {
            $product->images()->detach();
        }

        //attach image from tinymce
        foreach($imagesTag as $imageTag) {
            //get image attribute
            $data = $imageTag->getAttribute('src');

            $path_parts = pathinfo($data);

            $imageName = $path_parts['basename'];

            $image = Image::where('name', '=', $imageName)->first();

            if(!empty($image)) {
                $product->images()->attach($image, ['option' => 3, 'info' => 'tinymce']);
            }
        }

        if(!empty($request->featuredImage)) {
            $featuredImage = Image::find($request->featuredImage);
            $product->images()->attach($featuredImage, ['option' => 1, 'info' => 'featured image']);
        }

        if(count($request->galleryimage) > 0) {
            foreach($request->galleryimage as $item) {
                $gallery = Image::find($item);
                $product->images()->attach($gallery, ['option' => 2, 'info' => 'gallery image']);
            }
        }

        return redirect()->route('product.index')->with('flashmessage', 'Product was edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->images()->detach();
        $product->delete();

        return redirect()->route('product.index')->with('flashmessage', 'Product was deleted.');
    }
}
