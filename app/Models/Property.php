<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;

class Property extends Model
{
    use Sluggable;

    protected $table = "properties";
    function city(){
      return $this->belongsTo('App\Models\City');
    }
    function gallery()
    {
        return $this->hasMany('App\Models\Gallery');
    }
    function city_address()
    {
        return $this->belongsTo('App\Models\Address','address_id');
    }
    function user()
    {
        return $this->belongsTo('App\Models\User');
    }
      /**
     * Boot the model.
     */

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true

            ]
        ];
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($property) {
    //         $property->slug = $property->createSlug($property->name);
    //         $property->save();
    //     });
    // }

    // /**
    //  * Write code on Method
    //  *
    //  * @return response()
    //  */

    // private function createSlug($title){
    //     if (static::whereSlug($slug = Str::slug($title))->exists()) {

    //         $max = static::whereName($title)->latest('id')->skip(1)->value('slug');

    //         if (isset( $max ) && is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function ($mathces) {
    //                 return $mathces[1] + 1;
    //             }, $max);
    //         }
    //         return "{$slug}-2";
    //     }
    //     return $slug;
    // }
}
