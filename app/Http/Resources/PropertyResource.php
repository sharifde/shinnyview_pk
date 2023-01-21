<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            "id"    => $this->id,
            "title"    => $this->name,
            "email" =>  $this->email,
            "user_name" =>  $this->user_name,
            "user_email" =>  $this->user_email,
            "user_phone" =>  $this->user_phone_number,
            "user_image" =>  asset('images/profile_avatar/' . $this->user_image),
            "phone_num" =>  $this->phone_num,
            "province_name" =>  $this->province_name,
            // "province_id" =>  $this->province_id,
            "city_name" => $this->city_name,
            // "address_id" => $this->address_id,
            "address_name" => $this->address_name,
            "purpose_id" => $this->purpose_id,
            "property_type_id" => $this->property_type_id,
            "purpose_type_inner_id" => $this->purpose_type_inner_id,

            "dealer_address" => $this->user_address,


            "purpose_name" => $this->purpose_name,
            "property_type" => $this->property_type_name,
            "price_int" => $this->price,
            "price" => convertCurrency($this->price),
            "area" => $this->area,
            "bedroom" => $this->bedroom,
            "bath" => $this->bath,
            "garage" => $this->garage,
            "size" => $this->size,
            "property_featured" => $this->property_feature,

            "plot_number" => $this->plot_number,
            "youtube_link" => $this->youtube_link,
            "description" => $this->description,
            "user_id" => $this->user_id,
            "status" => $this->status,
            "boost" => $this->boost,
            "featured" => $this->featured,
            "image" =>  asset('properties/gallery/' . $this->image),
            'gallery' =>  GalleryResource::collection($this->gallery)

        ];
    }
}
