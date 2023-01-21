<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\City;
use App\User;
use Hash;
use Auth;
use Mail;
use App\Mail\ContactMail;
use App\MyConstants;
use Captcha;

class Contact extends Component
{
    public $name, $email, $phone, $subject, $message, $captcha;

    public function render()
    {
        return view('livewire.contact');
    }

    public function mount()
    {
    }
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
       
    }
    public function sendEmail()
    {
       

        // return dd('deo');
        $validatedDate = $this->validate(
            [
                'email' => 'required|email',
                'name' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',

            ],
           
        );

        $data = array('name' => $this->name, 'email' => $this->email, 'phone' => $this->phone, 'subject' => $this->subject, 'message' => $this->message);
        Mail::to(MyConstants::ADMIN_EMAIL)->send(new ContactMail($data));
        session()->flash('message', 'Your email has been send successfully to Admin.');
        $this->resetInputFields();
    }
}
