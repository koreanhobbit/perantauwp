<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\ContactMessage;
use App\Country;
use App\Service;

class ContactController extends Controller
{
    public function create()
    {
        $oriCountries = Country::where('type', 0)->orderBy('name', 'asc')->get(); 
        $countries = Country::where('type', 1)->orderBy('name', 'asc')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $setting = Setting::first(); 
        return view('frontend.theme.medicio.other_pages.contact', compact('setting', 'services', 'countries', 'oriCountries'));
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request, [ 
            'msformname' => 'required|string|max:255',
            'msformemail' => 'required|string|email|max:255',
            'msformphone' => 'required|string',
            'msformservice' => 'required|integer',
            'msformOricountry' => 'required|Integer',
            'msformcountry' => 'required|integer',
            'msformarrival' => 'nullable|date',
            'msformreturn' => 'nullable|date',
            'msformmessage' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $contact = ContactMessage::addNewContact($request);

        //add country id 
        $contact->countries()->attach($request->msformcountry);
        $contact->countries()->attach($request->msformOricountry);

        $setting = Setting::first(); 
        return redirect()->route('contact.create')->with('message', 'Pesan anda telah sukses terkirim. Kami akan segera menghubungi anda. Terimakasih.');
    }
}
