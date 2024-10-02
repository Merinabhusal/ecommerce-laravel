<?php

namespace App\Http\Controllers;

use App\Models\FeaturedItem;
use Illuminate\Http\Request;

class FeaturedItemController extends Controller
{

public function index(){

    $featuredItems = FeaturedItem::all();
return view('featureditem.index', compact('featuredItems'));
}

public function create(){

    return view('featureditem.create');
}

public function store(Request $request)
{
    // Validate the inputs, ensuring that the priority is unique in the 'featured_items' table
    $data = $request->validate([
        'priority' => 'required|unique:featured_items,priority', // Priority must be unique in the 'featured_items' table
         // Priority must be unique
        'name' => 'required|string|max:255',    // Name is required, must be a string with a max length of 255 characters
        'photopath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Photopath must be an image with specified formats
        'price' => 'required|numeric|min:0',    // Price is required and must be a positive number
    ]);

    // Handle the file upload if photopath is present
    if ($request->hasFile('photopath')) {
        $file = $request->file('photopath');
        // Get the original file name and prepend with current timestamp to avoid duplicates
        $filename = time() . '_' . $file->getClientOriginalName();
        // Store the file in the 'public/images/featureditems' directory
        $file->move(public_path('images/featureditems'), $filename);
        // Add the filename to the $data array to store it in the database
        $data['photopath'] = $filename;
    }

    // Create the new FeaturedItem with the validated data
    FeaturedItem::create($data);

    // Redirect to the index route with a success message
    return redirect(route('featureditem.index'))->with('success', 'Product Created Successfully');
}



public function edit($id){

    $featuredItems=FeaturedItem::find($id);
    return view('featureditem.edit',compact('featureditems'));
    }

    public function update(Request $request, $id){

        $featuredItems=FeaturedItem::find($id);
        $data = $request->validate([
        'priority'=>'required',
        'name'=>'required',
        'photopath' => 'required',
        'price'=>'required',

    ]);

    if($request->hasFile('photopath'))
    {
        $file = $request->photopath;
        //get file name with extension
        $filename = $file->getClientOriginalName();
        $filename = time().'_'.$filename;
        //store file in public
        $file->move('images/featureditems',$filename);
        $data['photopath'] = $filename;
    }


     $featuredItems->update($data);

     return redirect(route('featureditem.index'))->with('success','Items Updated Successfully');
      }

      public function destroy(Request $request)
      {

          $featuredItems=FeaturedItem::find($request->dataid);
          $featuredItems->delete();
          return redirect (route('featureditem.index'));
      }



      }






