<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\FeaturedItem;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\categories;
use App\Models\visit;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $totalproducts = Product::count();
        $totalitems = FeaturedItem::count();
        $totaltestimonials = Testimonial::count();
        $totalcategories = Categories::count();
        $totalcontacts = Contact::count();
        $totalcarts = Cart::count();
        $totalvisits = Visit::sum('no_of_visits');
$data=visit::all();



        // Define the date for filtering visits
        $visitdate = now()->subDays(7); // Example: visits from the last 7 days

        // Get the number of visits since the given date
        $visits = Visit::where('visit_date', '>=', $visitdate)->pluck('no_of_visits');



        // Pass both the visit data and the visit date to the view
        return view('admin.dashboard', compact(
            'totalproducts', 'totalitems', 'totaltestimonials', 'totalcategories',
            'totalcontacts', 'totalcarts', 'totalvisits', 'visits', 'visitdate'
        ));
    }


}
