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

public function store(Request $request) {

    $data = $request->validate([
        'name'=>'required',
        'email' => 'required',
        'message'=>'required',
    ]);

   Contact::create($data);
   return redirect(route('home'))->with('success','Contact Created Successfully');

}


public function destroy(Request $request){

    $contact= Contact::find($request->dataid);
    $contact->delete();
    return redirect (route('contact.index'));
}











}
