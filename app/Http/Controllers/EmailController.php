<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
   
    
    public function send(Request $request)
{
    $request->validate([
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'recipient_email' => 'required|email'
    ]);

    Mail::to($request->recipient_email)
        ->send(new SendEmail($request->subject, $request->message));
    Log::info('Email Sent Successfully', ['message' => $request->message]);

    return redirect()->back()->with('success', 'Email sent successfully!');
}
}
