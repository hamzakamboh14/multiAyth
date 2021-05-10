<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendemail()
    {
        $details=[
        'title' => 'Mail from Laravel for Testing',
        'body'  =>  'This is for testing mail using gmail'
        ];
        
        $success = Mail::to("hamza21461@gmail.com")->send(new TestMail($details));
        session()->flash('success', 'Message Sent Successfully!');
        return redirect()->back(); 
    }
}
