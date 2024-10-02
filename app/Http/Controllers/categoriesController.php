<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
   public function index() {
   $categories = categories::all();
    return view('category.index', compact('categories'));
}

    public function create() {
    return view('category.create');
}

    public function store(Request $request)
 {
    $validatedData = $request->validate([
        'priority' => 'required|integer|min:1|unique:categories,priority',     // Priority must be an integer and is required
        'name' => 'required|string|max:255',         // Name is required and should be a string with a max length
        'photopath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Photopath must be an image and is required
    ]);

        // If validation passes, you can continue to process and store the category
    // Example: Save category to the database
    $category = new categories();
    $category->priority = $request->priority;
    $category->name = $request->name;

    if ($request->hasFile('photopath')) {
        $imageName = time() . '.' . $request->photopath->extension();
        $request->photopath->move(public_path('imaged'), $imageName);
        $category->photopath = $imageName;
    }

    $category->save();

    return redirect()->route('category.index')->with('success', 'Category created successfully.');
}


public function edit($id){

     $categories=categories::find($id);
    return view('category.edit',compact('categories'));
    }

    public function update(Request $request, $id){

        $categories= categories::find($id);
        $data = $request->validate([
            'priority'=>'required',
            'name'=>'required',
            'photopath'=>'required',
 ]);

    if($request->hasFile('photopath'))
    {
        $file = $request->photopath;
        //get file name with extension
        $filename = $file->getClientOriginalName();
        $filename = time().'_'.$filename;
        //store file in public
        $file->move('images/categories',$filename);
        $data['photopath'] = $filename;
    }
     $categories->update($data);
      return redirect(route('category.index'))->with('success','Category Updated Successfully');
      }

      public function destroy(Request $request)
      {
         $categories=categories::find($request->dataid);
          $categories->delete();
          return redirect (route('category.index'));
      }


}
