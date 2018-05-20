<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
	protected $guarded = [];

    public function countries() 
    {
        return $this->belongsToMany('App\Country', 'contact_country', 'contact_id', 'country_id');
    }

    public static function addNewContact($request)
    {
        $arrival = null;
        $return = null;
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
    		'arrival' => $arrival,
    		'return' => $return,
    		'message' => $request->msformmessage,
    	]);
    }
}
