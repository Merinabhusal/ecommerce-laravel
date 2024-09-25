<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\FeaturedItem;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\categories;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $totalproducts = Product::count();
        $totalitems = FeaturedItem::count();
        $totaltestimonials = Testimonial::count();
        $totalcategories = categories::count();
        $totalcontacts = Contact::count();
        $totalcarts = Cart::count();


        return view('admin.dashboard', compact('totalproducts', 'totalitems', 'totaltestimonials', 'totalcategories', 'totalcontacts', 'totalcarts'));
    }
}
