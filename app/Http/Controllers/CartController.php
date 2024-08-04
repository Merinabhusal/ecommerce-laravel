<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Product $product)
    {
        $cart = Cart::where('user_id', auth()->id())->where('product_id', $product->id)->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function remove(Product $product)
    {
        $cart = Cart::where('user_id', auth()->id())->where('product_id', $product->id)->first();
        if ($cart) {
            $cart->delete();
        }

        return redirect()->route('cart.index');
    }
}

