<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Plan;
use Carbon\Carbon;
use Hash;

class Seller extends Component
{

    public $full_name, $email, $password, $password_confirmation;

    public function render()
    {
        // $this->role_seller_id = 3;
        // $this->role_agent_id = 2;
        return view('livewire.seller');
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

    }
    public function store()
    {
        $validatedDate = $this->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $today = new \Carbon\Carbon(Carbon::now());
        $this->password = Hash::make($this->password);
        $plan = Plan::find(1);
        $user = new User();
        $user->name =  $this->full_name;
        $user->email =  $this->email;
        $user->password =  $this->password;
        $user->confirm_password =  $this->password_confirmation;
        $user->name =  $this->full_name;
        $user->plan_id = $plan->id;
        $user->ads =  $plan->ads;
        $user->plan_expired_date = $today->addDays($plan->days);
        $user->role_id =  3;
        $user->save();
        session()->flash('message', 'Your register successfully. Please login.');
        $this->resetInputFields();
       // return redirect()->to('user/login');
       // $this->resetInputFields();
    }


}
