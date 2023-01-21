<?php

namespace App\Http\Livewire;

use App\Mail\ForgotEmail;
use Livewire\Component;
use App\Models\User;
use Newsletter;

class Subscribe extends Component
{
    public $email;
    public $mailchimp;
    public $listId = '0e5ec5601as';
    public function render()
    {
        return view('livewire.subscribe');
    }
    public function mount()
    {
    }
    public function submit()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
        ]);
        if (!Newsletter::isSubscribed($this->email)) {
            Newsletter::subscribePending($this->email);
            session()->flash('success', 'Email Subscribed successfully');
            $this->email = '';
        } else {
            session()->flash('error', 'Sorry! You have already subscribed');
        }
    }
}
