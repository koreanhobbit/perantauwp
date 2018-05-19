<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
	protected $guarded = [];

    public static function addNewContact($request)
    {
        if(!empty($request->msformarrival)) {
            $arrival = date("Y-m-d", strtotime($request->msformarrival));
        }
    	
        if(!empty($request->msformreturn)) {
    	   $return = date("Y-m-d", strtotime($request->msformreturn));
        }

    	return static::create([
    		'name' => $request->msformname,
    		'email' => $request->msformemail,
    		'phone' => $request->msformphone,
    		'service_id' => $request->msformservice,
    		'country_id' => $request->msformcountry,
    		'arrival' => $arrival,
    		'return' => $return,
    		'message' => $request->msformmessage,
    	]);
    }
}
