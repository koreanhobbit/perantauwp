<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Intervention\Image\ImageManagerStatic as ImageIv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Thumbnail;
use App\Medium;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:customer|superadministrator')->only(['store', 'destroy']);
        $this->middleware('role:superadministrator')->except(['store', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(30);
        return view('admin.mediamanagement.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mediamanagement.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('image') && Auth::check()) {
            $images = $request->file('image');
            if(!Storage::exists('public/upload/images/thumbnail/')) {
                Storage::makeDirectory('public/upload/images/thumbnail/');
            }

            if(!Storage::exists('public/upload/images/medium/')) {
                Storage::makeDirectory('public/upload/images/medium/');
            }

            foreach($images as $image) {
                //save the original pic in disc
                $name = uniqid(). '_' . time() . '_' . 'original' . $image->getClientOriginalName();
                $destinationPath = 'public/upload/images/original/';
                $image->storeAs($destinationPath, $name);

                //make and save thumbnail in disc
                $thumbDestinationPath = 'storage/upload/images/thumbnail/';
                $thumbName = uniqid(). '_' . time() . '_' . 'thumb' . $image->getClientOriginalName();
                $thumb = ImageIv::make('storage/upload/images/original/' . $name)->resize(100,100)->save($thumbDestinationPath . $thumbName);

                //make and save medium in disc
                $mediumDestinationPath = 'storage/upload/images/medium/';
                $mediumName = uniqid(). '_' . time() . '_' . 'medium' . $image->getClientOriginalName();
                $medium = ImageIv::make('storage/upload/images/original/' . $name)->resize(300,300)->save($mediumDestinationPath . $mediumName);

                //save the image to database
                $newImage = new Image;
                $newImage->name = $name;
                $newImage->location = 'storage/upload/images/original/' . $name;
                $newImage->size = $image->getClientSize();
                $newImage->type = $image->getClientMimeType();
                $newImage->user_id = Auth::id();
                $newImage->save();

                //save the thumbnail to database
                $newThumb = new Thumbnail;
                $newThumb->name = $thumbName;
                $newThumb->location = $thumbDestinationPath . $thumbName;
                $newThumb->size = Storage::size('public/upload/images/thumbnail/' . $thumbName);
                $newThumb->type = Storage::mimeType('public/upload/images/thumbnail/' . $thumbName);
                $newThumb->image_id = $newImage->id;
                $newThumb->save();

                //save the medium to database
                $newMedium = new Medium;
                $newMedium->name = $mediumName;
                $newMedium->location = $mediumDestinationPath . $mediumName;
                $newMedium->size = Storage::size('public/upload/images/medium/' . $mediumName);
                $newMedium->type = Storage::mimeType('public/upload/images/medium/' . $mediumName);
                $newMedium->image_id = $newImage->id;
                $newMedium->save();
            }
            session()->flash('flashmessage', 'Image(s) added successfully');
        }
        else {
            return response()->json(['message' => 'Uploading image failed, please add again']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('admin.mediamanagement.image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        if($image->has('thumbnail')) 
        {
            
            $thumbId = $image->thumbnail->id;
            $thumb = Thumbnail::find($thumbId);
            $thumbName = $thumb->name;
            Storage::delete('public/upload/images/thumbnail/' . $thumbName);
            $thumb->delete();
        }
        
        Storage::delete('public/upload/images/original/' . $image->name);
        $image->delete(); 
        session()->flash('flashmessage', 'Image(s) deleted successfully');
        return redirect()->route('image.index');       
    }
}
