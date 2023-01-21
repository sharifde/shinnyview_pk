<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Livewire\Component;

class PropertyDropdownFilter extends Component
{
    public $sortBy = '';
    public $searchType = '';

    public function render()
    {
        $data['total_properties'] = Property::count();
        return view('livewire.property-dropdown-filter', $data);
    }

    public function sortBy()
    {
        $this->emit('sortBy', $this->sortBy); 
    }
}
