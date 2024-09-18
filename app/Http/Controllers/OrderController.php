<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Create a new Order instance
        $order = new Order;
        $order->user_id = $user->id; // Assign the user ID to the order

        // Assuming you have fields for total price and other order details
        $order->total = array_sum(array_map(function($price, $quantity) {
            return $price * $quantity;
        }, $request->price ?? [], $request->quantity ?? []));


        $order->status = 'Pending'; // You can set an initial order status like 'Pending'
        $order->save(); // Save the order

// Create order items
// foreach ($request->product_name ?? [] as $index => $productName) {
//     $orderItem = new Order;

//     $orderItem->product_name = $productName;
//     $orderItem->price = $request->price[$index] ?? 0;
//     $orderItem->quantity = $request->quantity[$index] ?? 1;
//     $orderItem->save();
// }

// Clear the cart for the authenticated user
DB::table('carts')->where('user_id', $user->id)->delete();

// Redirect with a success message
return redirect()->back()->with('success', 'Order placed successfully and cart cleared!');
}






}



