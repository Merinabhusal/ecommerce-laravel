<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function sendContactInfo(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email',
            'message'=> 'required|string',
        ]);

        // Process and send email or store in database
        // Example: Mail::to(config('mail.admin_email'))->send(new ContactFormMail($validatedData));

        // Redirect back with success message
        return redirect()->route('contact.form')->with('success', 'Message sent successfully!');
    }
}
