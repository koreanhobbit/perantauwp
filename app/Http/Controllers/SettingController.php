<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Currency;
use App\Image;
use App\Websosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Setting $setting)
    {
        
        if ($request->ajax() && $request->title == 'logoImagePage') {
            $logoImages = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'logoImagePage');
            return view('admin.setting.partials._logo', compact('logoImages'))->render();
        }

        if ($request->ajax() && $request->title == 'iconImagePage') {
            $iconImages = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'iconImagePage');
            return view('admin.setting.partials._icon', compact('iconImages'))->render();
        }

        if($request->ajax()  && $request->title == 'bgImage1Page') {
            $bgImages1 = Image::where('id' , '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'bgImage1Page');
            return view('admin.setting.partials._bgImage1', compact('bgImages1'))->render(); 
        }

        if($request->ajax() && $request->title == 'bgImage2Page') {
            $bgImages2 = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'bgImage2Page');
            return view('admin.setting.partials._bgImage2', compact('bgImages2'))->render();
        }

        //mark if logo exist or not in the product
        $logoMark = false;
        if($setting->images()->wherePivot('option', 4)->first()) {
            $logoMark = true;
        }

        //if there is logo send the properties
        if($logoMark) {
             $logo = $setting->logoImage();              
        }
        else {
            $logo = null;
        }

        //mark if icon exist or not in the product
        $iconMark = false;
        if($setting->images()->wherePivot('option', 5)->first()) {
            $iconMark = true;
        }

        //if there is featured image send the properties
        if($iconMark) {
             $icon = $setting->iconImage();              
        }
        else {
            $icon = null;
        }

        //mark if bg image 1 exist or not in the product
        $bgImage1Mark = false;
        if($setting->images()->wherePivot('option', 6)->first()) {
            $bgImage1Mark = true;
        }

        // if there is bg image 1 send the properties
        if($bgImage1Mark) {
             $bgImage1 = $setting->themesetting->bgImage1();              
        }
        else {
            $bgImage1 = null;
        }

        //mark if bg image 2 exist or not in the product
        $bgImage2Mark = false;
        if($setting->images()->wherePivot('option', 7)->first()) {
            $bgImage2Mark = true;
        }

        // if there is bg image 2 send the properties
        if($bgImage2Mark) {
             $bgImage2 = $setting->themesetting->bgImage2();              
        }
        else {
            $bgImage2 = null;
        }

        $iconImages = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'iconImagePage');

        $logoImages = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'logoImagePage');

        $bgImages2 = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'bgImage1Page');

        $bgImages1 = Image::where('id', '<>', 1)->orderBy('id', 'desc')->paginate(12, ['*'], 'bgImage2Page');

        $currencies = Currency::orderBy('name', 'asc')->get();

        return view('admin.setting.index', compact('setting', 'currencies', 'logoMark', 'logo', 'iconMark', 'icon' ,'logoImages', 'iconImages', 'bgImage1Mark', 'bgImage1', 'bgImages1', 'bgImage2Mark', 'bgImage2', 'bgImages2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2'],
            'tagline' => ['required', 'min:2'],
            'currency' => ['required'],
            'about' => ['required'],
            'privacypolicy' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'background' => ['required'],
            'color' => ['required'],
        ]);

        $setting->name = trim($request->name);
        $setting->tagline = trim($request->tagline);
        $setting->currency_id = $request->currency;
        $setting->background_id = $request->background;
        $setting->color_id = $request->color;
        $setting->address = $request->address;
        $setting->privacy_policy = $request->privacypolicy;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->about = $request->about;
        $setting->save();

        foreach(Websosmed::get() as $contact) {
            $name = $contact->slug;
            $contact->value = $request->$name;
            $contact->save();
        }

        //detach all image in logo
        $setting->images()->detach();

        //save the new logo
        if(!empty($request->logo)) {
            //find the image
            $logo = Image::find($request->logo);
            $setting->images()->attach($logo, ['option' => 4, 'info' => 'logo']);
        }

        if(!empty($request->icon)) {
            //find the icon image
            $icon = Image::find($request->icon);
            $setting->images()->attach($icon, ['option' => 5, 'info' => 'icon']);
        }

        //detach all image in theme
        $setting->themesetting->images()->detach();

        //save the image in theme
        if(!empty($request->bgImage1)) {
            //find the image
            $bgImage1 = Image::find($request->bgImage1);
            $setting->themesetting->images()->attach($bgImage1, ['option' => 6, 'info' => 'theme image 1']);
        }

        if(!empty($request->bgImage2)) {
            //find the image
            $bgImage2 = Image::find($request->bgImage2);
            $setting->themesetting->images()->attach($bgImage2, ['option' => 7, 'info' => 'theme image 2']);
        }

        return redirect()->route('setting.index', ['setting' => 1 ])->with('flashmessage', 'Setting is reset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
