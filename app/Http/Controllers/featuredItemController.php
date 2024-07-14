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

    FeaturedItem::create($data);
    return redirect(route('featureditem.index'))->with('success',' Products Created Successfully');

}

}


