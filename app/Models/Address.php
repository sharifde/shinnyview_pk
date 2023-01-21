<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $table = "city_address";
  public static function cityAddress($id){
    //return $this->belongsTo('App\Models\City');
   return Address::find($id);
  }

}

