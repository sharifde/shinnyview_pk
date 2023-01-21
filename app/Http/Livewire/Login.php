<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\City;
use App\User;
use Hash;
use Auth;

class Login extends Component
{
    public $users,$email,$password;
    public $cities;

    public function render()
    {
        return view('livewire.login');
    }

    public function mount()
    {

    }
    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (\Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            $role = Auth::user()->role_id;
            switch ($role) {
              case '1':
                return  redirect()->to('/admin/dashboard');;
                break;
              case '2':
                return  redirect()->to('/agent/dashboard');
                break;
              case '3':
                  return  redirect()->to('/private_seller/dashboard');
                  break;
              default:
                return '/';
              break;
            }
           // return redirect()->to('/');
        } else {
            session()->flash('error', 'Email and password are wrong.');
        }
    }


}
