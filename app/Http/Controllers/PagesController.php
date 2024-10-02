<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\categories;
use App\Models\FeaturedItem;
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
        $count=Cart::where('user_id',auth()->user()->id)->count();

        return view('products',compact('count', 'products'));

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

    $data = Product::paginate(3);
    $user = auth()->user();

    if ($user) {
        // Count cart items for the logged-in user
        $counts = Cart::where('user_id', $user->id)->count();
    } else {
        // If no user is logged in, set cart count to 0
        $counts = 0;
    }

    $data = Product::paginate(3);

    return view('user', compact('data', 'counts'));

}
    }


public function about(){
    $count=Cart::where('user_id',auth()->user()->id)->count();
    return view('about', compact('count'));



}

 public function contact (){
    $count=Cart::where('user_id',auth()->user()->id)->count();

    return view('contact',compact('count'));
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

     public function addcart(Request $data,int $product_id)
{
$item=new Cart();
$item->user_id=auth()->user()->id;
$item->product_id=$product_id;
$item->quantity=$data->input('quantity');
$product=Product::find($product_id);

$item->total=$product->price * $data->input('quantity');

$item->save();

return redirect()->back()->with('message','Product has been successfully added to cart');



}








public function Cart(Request $request)
{
    // Handle query parameters
    $productId = $request->query('product_id');
    $quantity = $request->query('quantity');

    if ($productId && $quantity) {
        $product = Product::find($productId);

        if ($product) {
            $cart = session()->get('cart', []);

            // If product already exists in the cart, update quantity
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                // Add product to cart if it doesn't exist
                $cart[$productId] = [
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "photopath" => $product->photopath
                ];
            }

            session()->put('cart', $cart);
            return redirect()->route('cart.view')->with('success', 'Product added to cart!');
        }
    }

    // Display the cart view
    return view('cart.index');
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

    public function viewcart() {
$user=auth()->user();
$count=Cart::where('user_id',$user->id)->count();

         $cartItems = Cart::with('product')
                       ->where('user_id', auth()->id())
                     ->get();
        return view('viewcart', compact('count', 'cartItems'));
    }

      public function viewproduct($id) {
     $product= Product::find($id);
     $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
     $viewproduct= Product::find($id);
     $count=Cart::where('user_id',auth()->user()->id)->count();
     $total= 0;


     // Calculate total amount
     foreach ($cartItems as $cart) {
         $total += $cart->quantity * $cart->product->price;

     }


    return view('viewproduct', compact('viewproduct','product','count','total'));
    }




    public function viewfeaturedproduct($id) {
        $featuredproduct= FeaturedItem::find($id);
        $cartItems = Cart::where('user_id', Auth::id())->with('featuredproduct')->get();
        $viewfeaturedproduct= FeaturedItem::find($id);
        $count=Cart::where('user_id',auth()->user()->id)->count();
        $total= 0;


        // Calculate total amount
        foreach ($cartItems as $cart) {
            $total += $cart->quantity * $cart->product->price;

        }


       return view('viewfeaturedproduct', compact('viewfeaturedproduct','featuredproduct','count','total'));
       }




public function checkout()
{
    $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
    $cart = session()->get('cart', []);
    $count=Cart::where('user_id', Auth::id())->count();
    $total= 0;


    // Calculate total amount
    foreach ($cartItems as $cart) {
        $total += $cart->quantity * $cart->product->price;
    }

    // Add Rs100 as a payment on delivery fee
    $paymentFee = 100;


    return view('checkout', compact('cartItems', 'total','count','cart' ,'paymentFee'));


}

            public function productlistAjax(){

             $products = Product::select('product_name')->where('status','0')->get();
              $data=[];

            foreach($products as $product){

              $data[] = $product['product_name'];

               }

                 return $data;



    }
}




