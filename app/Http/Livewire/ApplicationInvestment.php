<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ApplicationForm;
use Carbon\Carbon;
use Hash;

class ApplicationInvestment extends Component
{
    public $full_name,$email,$cnic,$gender,$status,$profession,$address,$mobile,$intrested_in,$interested_in_details,$land,
    $budget,$accept_term;
    public function render()
    {
        // $this->role_seller_id = 3;
        // $this->role_agent_id = 2;
        return view('livewire.application-investment');
    }

    public function mount()
    {
    }
    private function resetInputFields()
    {
        $this->full_name = '';
        $this->email = '';
        $this->cnic = '';
        $this->gender = '';
        $this->status = '';
        $this->profession = '';
        $this->address = '';
        $this->mobile = '';
        $this->intrested_in = '';
        $this->interested_in_details = '';
        $this->land = '';
        $this->budget = '';
        $this->accept_term = '';


    }
    public function store()
    {
      ;
        $validatedDate = $this->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|unique:application_forms|email|max:255',
            // 'cnic' => 'required|max:255',
            'gender' => 'required|max:255',
            //'status' => 'required|max:255',
            'profession' => 'required|max:255',
            'address' => 'required',
            'mobile'=>'required|unique:application_forms|max:255',
            'intrested_in' => 'required|max:255',
            'interested_in_details' => 'required|max:255',
            'land' => 'required|max:255',
            'budget' => 'required|max:255',
            'accept_term' => 'accepted'

        ]);


        $application = new ApplicationForm();
        $application->full_name =  $this->full_name;
        $application->email =  $this->email;
        $application->cnic =  $this->cnic;
        $application->gender =  $this->gender;
        $application->status =  $this->status;
        $application->profession =  $this->profession;
        $application->address =  $this->address;
        $application->mobile =  $this->mobile;
        $application->intrested_in = $this->intrested_in;
        $application->interested_in_details = $this->interested_in_details;
        $application->land =  $this->land;
        $application->budget =  $this->budget;
        $application->type = 1;
        $application->save();
        session()->flash('message', 'Your Form has been submit successfully.');
        $this->resetInputFields();
       // return redirect()->to('user/login');
        $this->resetInputFields();
    }
}
