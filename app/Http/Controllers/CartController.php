<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller

    {
        public function index(Product $product)
    {
        // Retrieve the cart from the session
        $carts = Session::get('cart', ['']);
        $product = Product::find($product);

        return view('cart.index', compact('carts', 'product'));
    }



         public function add(Request $request, $id)
        {
            $product = Product::find($id);

            if (!$product) {
                return redirect()->route('products.index')->with('error', 'Product not found.');
            }

            $cart = Session::get('cart', ['']);

            // Check if the product already exists in the cart
            if (isset($cart[$id])) {
                // Update quantity if the product exists
                $cart[$id]['quantity'] += $request->quantity;
            } else {
                // Add new product to cart
                $cart[$id] = [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ];
            }

            Session::put('cart', $cart);

            return redirect()->route('cart.index')->with('success', $product->product_name . ' added to cart!');
        }


        public function showCart()
        {
            $cartItems = Cart::where('user_id', auth()->id())->get();
            $count = $cartItems->count(); // Counting the number of items in the cart

            return view('cart', compact('cartItems', 'count'));
        }
}
