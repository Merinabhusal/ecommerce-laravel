<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cart = Session::get('cart', []);

        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => array_sum(array_column($cart, 'price')),
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price,
            ]);

            // Reduce stock
            $product = Product::find($item['product']->id);
            $product->decrement('stock', $item['quantity']);
        }

        Session::forget('cart');

        return redirect()->route('products.index')->with('success', 'Order placed successfully!');
    }
}
