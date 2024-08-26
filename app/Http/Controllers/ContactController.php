<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('welcome');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('dudyhartanto@gmail.com')
                    ->subject('New Contact Us Form Submission');
        });

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
