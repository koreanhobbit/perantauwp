<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Country;
use App\Service;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->ajax() && $request->title == 'loadArea') {
            $areas = Country::find($request->countryId)->areas;
            
            return view('frontend.theme.medicio.main_page.partials._area', compact('areas'))->render();
        } 

        if(!empty(Service::getSpecial())) {
            $special = Service::getSpecial();
        }
        else{
            $special = Service::getOneService();
        }

        $pricings = Service::where('highlight', 1)->take(3)->get();

        $services = Service::orderBy('name', 'asc')->get();
        $countries = Country::orderBy('id', 'asc')->get(); 
        $setting = Setting::first();
        return view('frontend.theme.medicio.main_page.index', compact('setting', 'countries', 'services', 'pricings', 'special'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
