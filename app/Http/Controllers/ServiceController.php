<?php

namespace App\Http\Controllers;

use App\Service;
use App\ServicePoint;
use App\ServiceFare;
use App\Currency;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('admin.companyservice.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = Currency::orderBy('id', 'asc')->get();
        return view('admin.companyservice.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the forms
        $this->validate($request, [
            'name' => ['required', 'min:2'],
            'icon' => ['required'],
            'pointdesc' => ['array'],
            'pointdesc.*' => ['nullable', 'string'],
            'fareperiod' => ['nullable', 'string'],
            'fareamount' => ['nullable', 'integer'],
            'faremessage' => ['nullable', 'string']
        ]);

        //add service to database
        $service = Service::addNewService($request);

        //add points
        if(count($request->pointdesc)) {
            foreach($request->pointdesc as $keydesc => $desc) {
                $point = new ServicePoint;
                $point->description = $desc;

                //save the slug
                foreach($request->pointslug as $keyslug => $slug) {
                    if($keydesc == $keyslug) {
                        $point->slug = $slug;
                    }
                }

                //save the show
                foreach($request->pointshow as $keyshow => $show) {
                    if($keydesc == $keyshow) {
                        $point->show = 1;
                    }
                }
                $point->service_id = $service->id;
                $point->save();
            }
        }

        //make and fare to the service
        $fare = new ServiceFare;
        $fare->service_id = $service->id;
        if(!empty($request->farecurrency)) {
            $fare->currency = $request->farecurrency;
        }

        if(!empty($request->fareperiod)) {
            $fare->period = $request->fareperiod;
        }

        if(!empty($request->fareamount)) {
            $fare->fee = $request->fareamount;
        }

        if(!empty($request->faremessage)) {
            $fare->message = $request->faremessage;
        }

        $fare->save();

        return redirect()->route('service.index')->with('flashmessage', 'Service was succesfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $currencies = Currency::orderBy('id', 'asc')->get();
        return view('admin.companyservice.edit', compact('service', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //validate the forms
        $this->validate($request, [
            'name' => ['required', 'min:2'],
            'icon' => ['required'],
            'pointdesc' => ['array'],
            'pointdesc.*' => ['nullable', 'string'],
            'fareperiod' => ['nullable', 'string'],
            'fareamount' => ['nullable', 'integer'],
            'faremessage' => ['nullable', 'string']
        ]);

        //edit service in database
        $service->name = $request->name;
        $service->short_desc = $request->shortdesc;
        $service->description = $request->description;
        $service->icon = $request->icon;
        $service->type = $request->type;
        $service->highlight = $request->highlight;
        $service->save();

        //remove all points and fare
        foreach($service->points as $point) {
            $point->delete();
        }

        //add points
        if(count($request->pointdesc)) {
            foreach($request->pointdesc as $keydesc => $desc) {
                $point = new ServicePoint;
                $point->description = $desc;

                //save the slug
                foreach($request->pointslug as $keyslug => $slug) {
                    if($keydesc == $keyslug) {
                        $point->slug = $slug;
                    }
                }

                //save the show
                foreach($request->pointshow as $keyshow => $show) {
                    if($keydesc == $keyshow) {
                        $point->show = 1;
                    }
                }
                $point->service_id = $service->id;
                $point->save();
            }
        }

        //edit fare to the service
        $fare = $service->fare;
        $fare->service_id = $service->id;
        $fare->currency = $request->farecurrency;
        $fare->period = $request->fareperiod;
        $fare->fee = $request->fareamount;
        $fare->message = $request->faremessage;
        $fare->save();

        return redirect()->route('service.index')->with('flashmessage', 'Service was edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->forms()->detach();
        $service->delete();
        return redirect()->route('service.index')->with('flashmessage', 'Service is succesfully deleted');
    }
}
