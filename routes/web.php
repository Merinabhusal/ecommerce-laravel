<?php

use App\Http\Controllers\categoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeaturedItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Models\categories;
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
    return view('welcome', compact('products','featureditems','testimonials','categories'));


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

   Route::get('/product',[ProductController::class,'index'])->name('products.index');
    Route::get('/product/create', [ProductController::class,'create'])->name('products.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
    Route::post('/product/{id}/update', [ProductController::class,'update'])->name('products.update');
    Route::post('/product/destroy', [ProductController::class,'destroy'])->name('products.destroy');


Route::get('/featureditem',[FeaturedItemController::class,'index'])->name('featureditem.index');
    Route::get('/featureditem/create', [FeaturedItemController::class,'create'])->name('featureditem.create');
    Route::post('/featureditem/store', [FeaturedItemController::class,'store'])->name('featureditem.store');
    Route::get('/featureditem/{id}/edit', [FeaturedItemController::class,'edit'])->name('featureditem.edit');
    Route::post('/featureditem/{id}/update', [FeaturedItemController::class,'update'])->name('featureditem.update');
    Route::post('/featureditem/destroy', [FeaturedItemController::class,'destroy'])->name('featureditem.destroy');


Route::get('/testimonial',[TestimonialController::class,'index'])->name('testimonials.index');
    Route::get('/testimonial/create', [TestimonialController::class,'create'])->name('testimonials.create');
    Route::post('/testimonial/store', [TestimonialController::class,'store'])->name('testimonials.store');
    Route::get('/testimonial/{id}/edit', [TestimonialController::class,'edit'])->name('testimonials.edit');
    Route::post('/testimonial/{id}/update', [TestimonialController::class,'update'])->name('testimonials.update');
    Route::post('/testimonial/destroy', [TestimonialController::class,'destroy'])->name('testimonials.destroy');


   Route::get('/category',[categoriesController::class,'index'])->name('category.index');
    Route::get('/category/create', [categoriesController::class,'create'])->name('category.create');
    Route::post('/category/store', [categoriesController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit', [categoriesController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update', [categoriesController::class,'update'])->name('category.update');
    Route::post('/category/destroy', [categoriesController::class,'destroy'])->name('category.destroy');


    Route::get('/contact', 'ContactUsController@showForm')->name('contact.form');
    Route::post('/contact', 'ContactUsController@sendContactInfo')->name('contact.send');






    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
