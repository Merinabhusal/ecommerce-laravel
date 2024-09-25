<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller

{


    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }


    public function store(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get all cart items for the user
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Check if cart is not empty
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        // Create a new Order instance
        $order = new Order;
        $order->user_id = $user->id; // Assign the user ID to the order

        // Calculate the total price from the cart items
        $order->total = $cartItems->sum(function($cartItem) {
            return $cartItem->quantity * $cartItem->product->price;
        });

        $order->status = 'Pending'; // You can set an initial order status like 'Pending'
        $order->save(); // Save the order

        // Save each cart item to order items (assuming you have an OrderItem model)
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id= $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();
        }

        // Clear the cart for the authenticated user
        Cart::where('user_id', $user->id)->delete();

        // Redirect to the home route with a success message
        return redirect()->route('home')->with('success', 'Order has been placed successfully and cart cleared!');
    }


    public function status($id,$status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        return redirect(route('order.index'))->with('success','Status changed to '.$status);
    }







}


