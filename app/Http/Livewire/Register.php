<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Hash;

class Register extends Component
{
    public $sellerFormVisible = false;
    public $agentFormVisible = false;

    public function render()
    {

        return view('livewire.register');
    }

    public function mount()
    {
    }
    public function seller()
    {
        $this->sellerFormVisible = true;
        $this->agentFormVisible = false;

    }
    public function agent()
    {
        $this->agentFormVisible = true;
        $this->sellerFormVisible = false;

    }
}
