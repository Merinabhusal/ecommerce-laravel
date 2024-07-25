<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{

public function index(){

$products=Product::all();

return view('products',['products'=>$products]);

}

public function about(){

return view('about');

}

 public function contact (){

    return view('contact');

}

public function loginuser(){

return view('loginuser');
}

public function registeruser(){

return view('registeruser');
}
}
