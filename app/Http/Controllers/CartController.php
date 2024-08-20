<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\categories;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller

    {
        public function index()
        {
            $cartItems = Cart::where('user_id', auth()->id())->get();
            return view('cart.index', compact('cartItems'));
        }

         public function show()
       {
           $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

           return view('cart.show', compact('cartItems'));
       }


public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $cartItem = Cart::updateOrCreate(
        [
            'user_id' => Auth::id(),
            'product_id' => $request->input('product_id')
        ],
        [
            'quantity' => DB::raw('quantity + '.$request->input('quantity'))
        ]
    );

    return back()->with('success', 'Product added to cart successfully!');
}




       public function removeFromCart(Request $request)
        {
            Cart::where('user_id', auth()->id())
                    ->where('product_id', $request->input('product_id'))
                    ->delete();

            return redirect()->route('cart.show')->with('success', 'Item removed from cart!');
        }

        public function clearCart()
        {
            Cart::where('user_id', auth()->id())->delete();
            return redirect()->route('cart.show')->with('success', 'Cart cleared!');
        }
    }
