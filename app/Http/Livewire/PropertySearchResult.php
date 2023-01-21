<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;
use DB;
class PropertySearchResult extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchType = '';
    public $searchTypeTwo = '';
    public $searchTypeThree ='';

    public $user_id = '';
    public $city = '';
    public $minPrice = 0;
    public $maxPrice = 0;
    public $propertyType = '';
    public $bedRooms = '';
    public $bathRooms = '';

    // public $minArea = '';
    // public $maxArea = '';
    public $sortBy = '';
    protected $listeners = ['propertyFilter', 'sortBy' => 'sortFun'];

    public function mount($request,$data){
        if(isset($request['searchType'])){
            $this->searchType =  isset($request['searchType'])?$request['searchType']:'';
            $this->searchTypeTwo =  isset($request['searchTypeTwo'])?$request['searchTypeTwo']:'';
            $this->searchTypeThree =  isset($request['searchTypeThree'])?$request['searchTypeThree']:'';
            $this->city =  isset($request['city'])?$request['city']:'';

        }else{
            $this->searchType =  isset($data['searchType'])?$data['searchType']:'';
            $this->searchTypeTwo =  isset($data['searchTypeTwo'])?$data['searchTypeTwo']:'';
            $this->searchTypeThree =   isset($data['searchTypeThree'])?$data['searchTypeThree']:'';
            $this->city =   isset($data['city'])?$data['city']:'';
        }
        $this->user_id =  isset($request['agent'])?$request['agent']:'';
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

    public function render()
    {
        $data['boost_count'] = $this->getProperties()->where('boost', '1')->count();
        $data['featured_count'] = $this->getProperties()->where('featured', '1')->count();
        $data['other_count'] = $this->getProperties()->where('boost','!=', 1)->where('featured', '!=',1)->count();
        $data['properties'] = $this->getProperties()->get();
        // $data['featured'] = $this->getProperties()->where('featured', '1')->paginate(10);
        // $data['boost'] = $this->getProperties()->where('boost', 1)->paginate(10);
        return view('livewire.property-search-result', $data);
    }

    private function getProperties(){
        if($this->sortBy == 'Lowest Price'){
            $col = 'price';
            $cond = 'asc';
        }else if($this->sortBy == 'Highest Price'){
            $col = 'price';
            $cond = 'desc';
        }else{
            $col = 'created_at';
            $cond = 'desc';
        }
        $property_sql = DB::table('properties as p')
        ->join('cities as c','p.city_id','=','c.id')
        ->join('property_purpose as pp','p.purpose_id','pp.id')
        ->join('property_type as pt','p.property_type_id','pt.id')
        ->select('p.id','p.name','p.slug','p.image','p.price','p.area','p.garage','p.bedroom','p.bath','p.size','c.name as city_name','pp.name as purpose','pt.name as propertyType','p.created_at','p.boost','p.description','p.phone_num','p.featured');

        $properties = $property_sql->where('status', 1)
        ->where(function($q){
            if($this->searchType != '')
                $q->where('p.purpose_id', $this->searchType);
        })
        ->where(function($q){
            if($this->searchTypeTwo != '')
                $q->where('p.property_type_id', $this->searchTypeTwo);
        })
        ->where(function($q){
            if($this->searchTypeThree != '')
                $q->where('p.purpose_type_inner_id', $this->searchTypeThree);
        })
        ->where(function($q){
            if($this->user_id != '')
                $q->where('p.user_id', $this->user_id);
        })
        ->where(function($q){
            if($this->city != '')
                $q->where('p.city_id', $this->city);
        })
        ->where(function($q){
            if($this->minPrice != '' && $this->maxPrice != '')
                $q->whereBetween('p.price', [ $this->minPrice, $this->maxPrice ]);
        })
        ->where(function($q){
            if($this->propertyType != '')
                $q->where('p.property_type_id', $this->propertyType);
        })
        ->where(function($q){
            if($this->bedRooms != '')
                $q->where('p.bedroom', $this->bedRooms);
        })
        ->where(function($q){
            if($this->bathRooms != '')
                $q->where('p.bath', $this->bathRooms);
        })
        // ->where(function($q){
        //     if($this->minArea != '' && $this->maxArea != '')
        //         $q->whereBetween('size', [ $this->minArea, $this->maxArea ]);
        // })
        ->orderBy('boost', 'desc')
        ->orderBy('featured', 'desc')
        ->orderBy($col, $cond);
        return $properties;
    }

    public function propertyFilter($request){
        $this->searchType = $request['searchType'];
        $this->searchTypeTwo = $request['searchTypeTwo'];
        $this->searchTypeThree = $request['searchTypeThree'];

        $this->city = $request['city'];
        $this->minPrice = $request['minPrice'];
        $this->maxPrice = $request['maxPrice'];
        $this->propertyType = $request['propertyType'];
        $this->bedRooms = $request['bedRooms'];
        $this->bathRooms = $request['bathRooms'];
        // $this->minArea = $request['minArea'];
        // $this->maxArea = $request['maxArea'];
    }

    public function sortFun($a){
        $this->sortBy = $a;
    }
}
