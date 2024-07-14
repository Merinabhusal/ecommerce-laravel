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

    categories::create($data);
    return redirect(route('category.index'))->with('success',' Category Created Successfully');
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
