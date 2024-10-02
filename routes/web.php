<?php

// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\FeaturedItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Models\Cart;
use App\Models\categories;
use App\Models\Contact;
use App\Models\FeaturedItem;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products=Product::all();
    $featureditems=FeaturedItem::all();
    $testimonials=Testimonial::all();
    $categories=categories::all();
     $contacts=Contact::all();
     if (auth()->check()) {
        $count = Cart::where('user_id', auth()->user()->id)->count();
    } else {
        $count = 0; // or handle it accordingly when no user is logged in
    }

 return view('welcome', compact('products','featureditems','testimonials','categories','contacts','count'));
})->name('home');



 Route::get('/userlogin',[PagesController::class,'userlogin'])->name('userlogin');
Route::get('/userregister',[PagesController::class,'userregister'])->name('user.register');
Route::post('/user/store',[PagesController::class,'userstore'])->name('user.store');


Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

// Frontend
 Route::get('/products',[PagesController::class,'index'])->name('products');
 Route::get('/about',[PagesController::class,'about'])->name('about');
 Route::get('/contacts',[PagesController::class,'contact'])->name('contacts');
Route::post('/addcart/{id}', [PagesController::class, 'addcart'])->name('addcart');
Route::get('/cart/view', [PagesController::class,'viewcart'])->name('viewcart');
// Route::get('product-list', [PagesController::class, 'productlistAjax']);





Route::post('/cart/add', [PagesController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/adds', [PagesController::class, 'cart'])->name('cart.adds');


Route::get('/viewproduct/{id}', [PagesController::class, 'viewproduct'])->name('viewproduct');
Route::get('/viewfeaturedproduct/{id}', [PagesController::class, 'viewfeaturedproduct'])->name('viewfeaturedproduct');

Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout');



//ProductsController
 Route::get('/product',[ProductController::class,'index'])->name('products.index');
 Route::get('/product/create', [ProductController::class,'create'])->name('products.create');
 Route::get('/product/store',[ProductController::class,'store'])->name('products.store');
 Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
 Route::post('/product/{id}/update', [ProductController::class,'update'])->name('products.update');
 Route::post('/product/destroy', [ProductController::class,'destroy'])->name('products.destroy');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');



 Route::get('/products-by-category/{id}', [ProductController::class, 'productsByCategory'])->name('products.by.category');





//FeaturedItemsController
Route::get('/featureditem',[FeaturedItemController::class,'index'])->name('featureditem.index');
    Route::get('/featureditem/create', [FeaturedItemController::class,'create'])->name('featureditem.create');
    Route::post('/featureditem/store', [FeaturedItemController::class,'store'])->name('featureditem.store');
    Route::get('/featureditem/{id}/edit', [FeaturedItemController::class,'edit'])->name('featureditem.edit');
    Route::post('/featureditem/{id}/update', [FeaturedItemController::class,'update'])->name('featureditem.update');
    Route::post('/featureditem/destroy', [FeaturedItemController::class,'destroy'])->name('featureditem.destroy');

//TestimonialsController
Route::get('/testimonial',[TestimonialController::class,'index'])->name('testimonials.index');
    Route::get('/testimonial/create', [TestimonialController::class,'create'])->name('testimonials.create');
    Route::post('/testimonial/store', [TestimonialController::class,'store'])->name('testimonials.store');
    Route::get('/testimonial/{id}/edit', [TestimonialController::class,'edit'])->name('testimonials.edit');
    Route::post('/testimonial/{id}/update', [TestimonialController::class,'update'])->name('testimonials.update');
    Route::post('/testimonial/destroy', [TestimonialController::class,'destroy'])->name('testimonials.destroy');

//categoriescontroller
   Route::get('/category',[categoriesController::class,'index'])->name('category.index');
    Route::get('/category/create', [categoriesController::class,'create'])->name('category.create');
    Route::post('/category/store', [categoriesController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit', [categoriesController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update', [categoriesController::class,'update'])->name('category.update');
    Route::post('/category/destroy', [categoriesController::class,'destroy'])->name('category.destroy');

//contactcontroller
   Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
    Route::post('/contact/store', [ContactController::class,'store'])->name('contact.store');
    Route::post('/contact/destroy', [ContactController::class,'destroy'])->name('contact.destroy');

//Cart Controller
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');


//CheckoutController

// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');



Route::get('/order',[OrderController::class,'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/status/{id}/{status}',[OrderController::class,'status'])->name('order.status');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
