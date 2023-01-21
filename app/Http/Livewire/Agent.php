<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Plan;
use Carbon\Carbon;
use Hash;

class Agent extends Component
{
    use WithFileUploads;
    public $full_name, $email, $password, $password_confirmation,$phone_number, $address, $company_phone_number, $company_name,
      $are_you_owner, $dealer_ship =  [], $dealer_ship_type = [];


    public function render()
    {
        // $this->role_seller_id = 3;
        // $this->role_agent_id = 2;
        return view('livewire.agent');
    }

    public function mount()
    {
    }
    private function resetInputFields()
    {
        $this->full_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->password_confirmation = '';
        $this->company_name = '';
        $this->company_phone_number = '';
        $this->address = '';
        $this->are_you_owner = '';
        $this->dealer_ship = [];
        $this->dealer_ship_type = [];
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'phone_number'=>'required|max:255',
            'company_name' => 'required|max:255',
            'company_phone_number' => 'required|max:255',
            'address' => 'required|max:255',
            'are_you_owner' => 'required|max:255',
            'dealer_ship' => 'required|max:255',
            'dealer_ship_type' => 'required|max:255'
        ]);
        $today = new \Carbon\Carbon(Carbon::now());
        $this->password = Hash::make($this->password);
        $plan = Plan::find(1);
        $user = new User();
        $user->name =  $this->full_name;
        $user->email =  $this->email;
        $user->password =  $this->password;
        $user->confirm_password =  $this->password_confirmation;
        $user->company_name =  $this->company_name;
        $user->company_phone_number =  $this->company_phone_number;
        $user->address =  $this->address;
        $user->are_you_owner =  $this->are_you_owner;
        $user->dealer_ship = json_encode($this->dealer_ship);
        $user->dealer_ship_type =  json_encode($this->dealer_ship_type);
        $user->plan_id = $plan->id;
        $user->ads =  $plan->ads;
        $user->plan_expired_date = $today->addDays($plan->days);
        $user->role_id = 2;
        $user->save();
        session()->flash('message', 'Your register successfully. Please login.');
        $this->resetInputFields();
       // return redirect()->to('user/login');
       // $this->resetInputFields();
    }


}
