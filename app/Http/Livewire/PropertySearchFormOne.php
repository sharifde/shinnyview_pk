<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Livewire\Component;

class PropertySearchFormOne extends Component
{
    public $searchType = '1';
    public $searchTypeTwo = '';
    public $city = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $propertyType = '';
    public $bedRooms = '';

    public function render()
    {
        $data['total_properties'] = Property::count();
        $data['property_count'] = Property::where('purpose_id', $this->searchType)
        ->where(function($q){
            if($this->city != '')
                $q->where('city_id', $this->city);
        })
        ->where(function($q){
            if($this->minPrice != '' && $this->maxPrice != '')
                $q->whereBetween('price', [ $this->minPrice, $this->maxPrice ]);
        })
        ->where(function($q){
            if($this->propertyType != '')
                $q->where('property_type_id', $this->propertyType);
        })
        ->where(function($q){
            if($this->searchTypeTwo != '')
                $q->where('property_type_id', $this->searchTypeTwo);
        })
        ->where(function($q){
            if($this->bedRooms != '')
                $q->where('bedroom', $this->bedRooms);
        })
        ->count();
        return view('livewire.property-search-form-one', $data);
    }

    public function resetForm(){

        $this->searchType = '1';
        $this->searchTypeTwo = '';
        $this->city = '';
        $this->minPrice = 0;
        $this->maxPrice = 0;
        $this->propertyType = '';
        $this->bedRooms = '';

    }

}
