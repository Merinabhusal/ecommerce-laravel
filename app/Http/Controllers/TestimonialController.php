<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
public function index() {

    $testimonials = Testimonial::all();

    return view('testimonials.index', compact('testimonials'));
}

public function create() {

    return view('testimonials.create');

}

public function store(Request $request) {

    $data = $request->validate([
        'priority'=>'required',
        'name'=>'required',
        'photopath' => 'required',
        'description'=>'required',
    ]);

       if($request->hasFile('photopath'))
    {
        $file = $request->photopath;
        //get file name with extension
        $filename = $file->getClientOriginalName();
        $filename = time().'_'.$filename;
        //store file in public
        $file->move('images/testimonials',$filename);
        $data['photopath'] = $filename;
    }

  Testimonial::create($data);
    return redirect(route('testimonials.index'))->with('success',' Testimonials Created Successfully');

}

public function edit($id) {

    $testimonials = Testimonial::find($id);
    return view('testimonials.edit', compact('testimonials'));
}

public function update(Request $request, $id){

    $testimonials=Testimonial::find($id);
    $data = $request->validate([
       'priority'=>'required',
        'name'=>'required',
        'photopath' => 'required',
        'description'=>'required',

]);

if($request->hasFile('photopath'))
{
    $file = $request->photopath;
    //get file name with extension
    $filename = $file->getClientOriginalName();
    $filename = time().'_'.$filename;
    //store file in public
    $file->move('images/testimonials',$filename);
    $data['photopath'] = $filename;
}


 $testimonials->update($data);

 return redirect(route('testimonials.index'))->with('success','Testimonial Updated Successfully');
  }

  public function destroy(Request $request)
  {

      $testimonials=Testimonial::find($request->dataid);
      $testimonials->delete();
      return redirect (route('testimonials.index'));
  }







}





