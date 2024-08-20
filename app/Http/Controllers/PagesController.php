<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\categories;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
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

$count= Cart::where('user_id',$user->user_id)->count();

return view('user',compact('data','count'));
}


}
public function showCart()
 {
    $count =5;
  return view('layouts.masters', compact('count'));
 }


public function about(){

return view('about');

}

 public function contact (){

    return view('contact');
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

public function addcart(Request $data)
{
if(session()->has('id'))
{

$item=new Cart();
$item->user_id=session()->get('id');
$item->product_id=$data->input['id'];
$item->quantity=$data->input('quantity');
$item->save();

return redirect()->back()->with('message','Product has been successfully added to cart');
}
else
{

    return redirect('login')->with('error','Please login to the system and try again');
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


    public function viewcart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $count=Cart::where('user_id', Auth::id())->count();

        return view('viewcart', compact('cartItems','count'));
    }


    //   public function viewproduct($id) {
    //     $products = Product::where('id')->firstOrFail();

    //      return view('viewproduct', compact('products'));
    // }



    public function viewproduct($id) {
        $viewproducts= Product::where('id', $id)->firstOrFail();

           if (!$viewproducts) {
            abort(404, 'Product not found');
        }

        return view('viewproduct', compact('viewproducts'));
    }






}
