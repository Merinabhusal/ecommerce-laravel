<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PagesController extends Controller
{

public function index(){

$products=Product::all();

return view('products',['products'=>$products]);

}

public function redirect()
{
$usertype=Auth::user()->usertype;

if($usertype=='1')

{

return view('admin');
}

else
{

$data=product::paginate(3);
$user=auth()->user();

$count= Cart::where('email',$user->email)->count();

return view('user',compact('data','count'));
}


}

// public function showCart()
// {
//     $count =5;
//     return view('layouts.masters', compact('count'));
// }







public function about(){

return view('about');

}

 public function contact (){

    return view('contact');
}

public function addcart(Request $request ,$id)

{
if(Auth::id())
{
$user=auth()->user();
$product=product::find($id);
$cart=new Cart();

$cart->name=$user->name;
$cart->email=$user->email;
$cart->product_name=$product->product_name;
$cart->price=$product->price;
$cart->quantity=$request->quantity;
$cart->save();




return redirect()->back()->with('message','Product has been successfully added to cart');
}

else{

return redirect('userlogin');

}


}

public function userlogin(Request $request)
{
    // Your login logic here
    return view('userlogin'); // Or whatever view you want to return
}


public function userregister(Request $request)
    {
        // Your registration logic here
        return view('userregister'); // Or whatever view you want to return
    }


    public function userstore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';

        User::create($data);

        return redirect(route('home'));
    }






}
