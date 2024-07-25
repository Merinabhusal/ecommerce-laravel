<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Contact;
use App\Models\FeaturedItem;
use App\Models\Product;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class DashboardController extends Controller
{

public function dashboard()
{
$totalproducts=Product::count();
$totalfeatureditem=FeaturedItem::count();
$totaltestimonials=Testimonial::count();
$totalcategories=categories::all();
$totalcontacts=Contact::all();
$date=Carbon::today()->subDays(30);
return view('dashboard',compact('totalproducts','totalfeatureditem','totaltestimonials' ,'totalcategories','totalcontacts','date'));

}



}

