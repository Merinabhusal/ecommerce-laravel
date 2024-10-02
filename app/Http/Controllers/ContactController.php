<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
public function index(){
 //display contact form view
 $contacts= Contact::all();
  return view('contact.index', compact('contacts'));
}

public function store(Request $request)
{
    // Validate the inputs
    $data = $request->validate([
        'name' => 'required|string|max:255',    // Name is required, must be a string, and has a max length of 255 characters
        'email' => 'required|email|max:255',    // Email is required, must be a valid email format, and has a max length of 255 characters
        'message' => 'required|string|max:1000', // Message is required, must be a string, and has a max length of 1000 characters
    ]);

    // Create a new contact record
    Contact::create($data);

    // Redirect to the home route with a success message
    return redirect(route('home'))->with('success', 'Contact Created Successfully');
}



public function destroy(Request $request){

    $contact= Contact::find($request->dataid);
    $contact->delete();
    return redirect (route('contact.index'));
}











}
