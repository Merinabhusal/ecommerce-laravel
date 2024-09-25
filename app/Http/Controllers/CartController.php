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
        public function addToCart(Request $request, $id)
        {
            // Find the product by ID
            $product = Product::find($id);

            // Check if the product exists
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }

            // Get the current cart from session or create a new empty one
            $cart = session()->get('cart', []);

            // Check if the product is already in the cart
            if (isset($cart[$id])) {
                // If it exists, increase the quantity
                $cart[$id]['quantity'] += $request->input('quantity', 1);
            } else {
                // Otherwise, add the product to the cart with initial quantity
                $cart[$id] = [
                    "name" => $product->product_name,
                    "quantity" => $request->input('quantity', 1),
                    "price" => $product->price,
                    "photopath" => $product->photopath
                ];
            }

            // Save the updated cart to the session
            session()->put('cart', $cart);

            // Redirect to the cart page or back to the product page with success message
            return redirect()->route('cart.view')->with('success', 'Product added to cart!');
        }


//             // View cart items
//             public function viewCart()
//             {
//                 return view('cart.index'); // Ensure you have a cart/index.blade.php view
//             }

//             // Remove product from cart
//             public function removeFromCart($id)
//             {
//                 $data=Cart::find($id);
//                 $data->delete();
// return redirect()->back()->with('message','Product has been successfully removed from cart');
//         }




// View cart items
public function viewCart()
{
    return view('cart.index'); // Ensure you have a cart/index.blade.php view
}

// Remove product from cart
public function removeFromCart($id)
{
    // Find the cart item by ID
    $cartItem = Cart::find($id);

    // Check if the item exists in the cart
    if ($cartItem) {
        // Delete the item
        $cartItem->delete();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Product has been successfully removed from the cart');
    }

    // If the cart item is not found, return an error message
    return redirect()->back()->with('error', 'Product not found in the cart');
}





    }




