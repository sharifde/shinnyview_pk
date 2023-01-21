<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Property;
use Livewire\Component;

class PropertySearchFormTwo extends Component
{

    public $searchType = '';
    public $searchTypeTwo = '';
    public $searchTypeThree ='';
    public $user_id = '';
    public $city = '';
    public $cityName = '';
    public $minPrice = 0;
    public $maxPrice = 0;
    public $propertyType = '';
    public $bedRooms = '';
    public $bathRooms = '';

    // public $minArea = '';
    // public $maxArea = '';

    public function mount($request){

        $this->searchType =  isset($request['searchType'])?$request['searchType']:'';
        $this->searchTypeTwo =  isset($request['searchTypeTwo'])?$request['searchTypeTwo']:'';
        $this->searchTypeThree =  isset($request['searchTypeThree'])?$request['searchTypeThree']:'';

        $this->user_id =  isset($request['agent'])?$request['agent']:'';
        $this->city =  isset($request['city'])?$request['city']:'';
        if(isset($request['city'])){
            $this->cityName = City::find($request['city'])->name;
        }else{
            $this->cityName = '';
        }
        $this->minPrice = isset($request['minPrice'])?$request['minPrice']:'';
        $this->maxPrice = isset($request['maxPrice'])?$request['maxPrice']:'';
        $this->propertyType = isset($request['propertyType']) ? $request['propertyType'] : '';
        $this->bedRooms = isset($request['bedRooms']) ? $request['bedRooms'] : '';
        $this->bathRooms = isset($request['bathRooms']) ? $request['bathRooms'] : '';


    }

    function rules(){
        return [
            'searchType' => 'nullable',
            'searchTypeTwo' => 'nullable',
            'searchTypeThree' => 'nullable',
            'city' => 'nullable',
            'minPrice' => 'nullable',
            'maxPrice' => 'nullable',
            'propertyType' => 'nullable',
            'bedRooms' => 'nullable',
            'bathRooms' => 'nullable'
            // 'minArea' => 'nullable',
            // 'maxArea' => 'nullable',
        ];
    }

    public function render()
    {
        $data['property_count'] = Property::where('status', 1)
        ->where(function($q){
            if($this->searchType != '')
                $q->where('purpose_id', $this->searchType);
        })
        ->where(function($q){
            if($this->searchTypeTwo != '')
                $q->where('property_type_id', $this->searchTypeTwo);
        })
        ->where(function($q){
            if($this->searchTypeThree != '')
                $q->where('purpose_type_inner_id', $this->searchTypeThree);
        })
        ->where(function($q){
            if($this->city != '')
                $q->where('city_id', $this->city);
        })
        ->where(function($q){
            if($this->user_id != '')
                $q->where('user_id', $this->user_id);
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
            if($this->bedRooms != '')
                $q->where('bedroom', $this->bedRooms);
        })
        ->where(function($q){
            if($this->bathRooms != '')
                $q->where('bath', $this->bathRooms);
        })
        ->count();

        return view('livewire.property-search-form-two',$data);
    }

    public function searchProperties(){
        $valid = $this->validate();
        $this->emit('propertyFilter', $valid);
    }
}
