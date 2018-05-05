<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormItem extends Model
{
   	public function formOptions()
   	{
   		return $this->hasMany('App\FormOption');
   	}

   	public function formPart()
   	{
   		return $this->belongsTo('App\FormPart');
   	}
}
