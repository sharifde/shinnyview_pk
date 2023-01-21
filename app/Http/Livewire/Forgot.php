<?php

namespace App\Http\Livewire;

use App\Mail\ForgotEmail;
use Livewire\Component;
use App\Models\User;
use Mail;


class Forgot extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.forgot');
    }
    public function mount()
    {

    }
    public function submit()
    {
      $validatedDate = $this->validate([
          'email' => 'required|email',
      ]);
      $user = User::where('email', $this->email)->where('status', 1)->first();
      if($user){
          Mail::to($user->email)->send(new ForgotEmail($user));
          session()->flash('message', 'Your Password has been send successfully to your email.');
          $this->email = '';
      }else{
          session()->flash('error', 'Email not found or Conatct to Admin');
      }
    }
}
