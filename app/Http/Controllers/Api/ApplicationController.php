<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApplicationForm;
use Illuminate\Http\Request;
use Toastr;
use App\Models\ImageHelper;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Validator;
use Mail;
use App\Mail\ContactMail;
use App\MyConstants;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeFormInvestment(Request $request)
    {
        $rules = [
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            // 'cnic' => 'required|max:255',
            'gender' => 'required|max:255',
            'status' => 'required|max:255',
            'profession' => 'required|max:255',
            'address' => 'required',
            'mobile'=>'required|max:255',
            'intrested_in' => 'required|max:255',
            'interested_in_details' => 'required|max:255',
            'land' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        try {

            $application = new ApplicationForm();
            $application->full_name =   $request->full_name;
            $application->email =   $request->email;
            $application->cnic =   $request->cnic;
            $application->gender =   $request->gender;
            $application->status =   $request->status;
            $application->profession =   $request->profession;
            $application->address =   $request->address;
            $application->mobile =   $request->mobile;
            $application->intrested_in =  $request->intrested_in;
            $application->interested_in_details =  $request->interested_in_details;
            $application->land =   $request->land;
            $application->type = 1;
            $application->save();
            return response()->json([
                'status' => true,
                'message' => 'Your Form has been successfully saved.'
            ], 200);
        } catch (\Exception $e) {
            // Anything that went wrong
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeFormHouse(Request $request)
    {
        $rules = [
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            // 'cnic' => 'required|max:255',
            'gender' => 'required|max:255',
            'status' => 'required|max:255',
            'address' => 'required',
            'mobile'=>'required|max:255',
            'intrested_in' => 'required|max:255',
            'interested_in_details' => 'required|max:255',

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        try {

            $application = new ApplicationForm();
            $application->full_name =  $request->full_name;
            $application->email =  $request->email;
            $application->cnic =  $request->cnic;
            $application->gender =  $request->gender;
            $application->status =  $request->status;
            $application->address =  $request->address;
            $application->mobile =  $request->mobile;
            $application->intrested_in = $request->intrested_in;
            $application->interested_in_details = $request->interested_in_details;
            $application->type = 2;
            $application->save();
            return response()->json([
                'status' => true,
                'message' => 'Your Form has been successfully saved.'
            ], 200);
        } catch (\Exception $e) {
            // Anything that went wrong
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function sendEmail(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        
        $data = array( 
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        );

        Mail::to(MyConstants::ADMIN_EMAIL)->send(new ContactMail($data));
        return response()->json([
                'status' => true,
                'message' => 'Email has been sent.'
            ], 200);
    }
}
