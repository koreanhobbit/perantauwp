<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Image;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('id', 'asc')->get();
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax() && $request->title == 'reloadImage') {
            $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagepage');
            return view('admin.partner.partials._image', compact('images'))->render();
        }

        $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagepage');
        return view('admin.partner.create', compact('images'));
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
            'name' => ['required', 'min:2', 'string'],
            'link' => ['required'],
            'image' => ['required'],
        ]);

        $partner = Partner::addNewPartner($request);

        if(!empty($request->image)) {
            // add image
            $image = Image::find($request->image);
            $partner->images()->attach($image, ['option' => 1, 'info' => 'featured image']);
        }

        return redirect()->route('partner.index')->with('flashmessage', 'Partner was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Partner $partner)
    {
        if($request->ajax() && $request->title == 'reloadImage') {
            $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagepage');
            return view('admin.partner.partials._image', compact('images'))->render();
        }

        $images = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'imagepage');
        return view('admin.partner.edit', compact('partner', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'string'],
            'link' => ['required'],
            'image' => ['required'],
        ]);

        //disattach image
        $partner->images()->detach();

        //edit partner in database
        $partner->name = $request->name;
        $partner->link = $request->link;
        $partner->save();

        if(!empty($request->image)) {
            $image = Image::find($request->image);

            //attach image
            $partner->images()->attach($image, ['option' => 1, 'info' => 'Featured Image']);
        }

        return redirect()->route('partner.index')->with('flashmessage', 'Partner was successfully edited!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->images()->detach();
        $partner->delete();
        return redirect()->route('partner.index')->with('flashmessage', 'Your partner was successfully deleted!');

    }
}
