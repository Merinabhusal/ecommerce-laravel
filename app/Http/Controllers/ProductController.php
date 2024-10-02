<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products',$products));
    }

    public function create()
    {
        return view('products.create');
    }

    // public function store(Request $request)
    // {
    //     // Validate the incoming request data, including category_id
    //     $data = $request->validate([
    //         'priority' => 'required',
    //         'product_name' => 'required',
    //         'description' => 'required',
    //         'photopath' => 'required|image', // You can also validate the file type if it's an image
    //         'price' => 'required|numeric',
    //         'category_id' => 'required|exists:categories,id', // Make sure category_id is included
    //     ]);

    //     // Handle file upload for photopath
    //     if ($request->hasFile('photopath')) {
    //         $file = $request->file('photopath');
    //         // Get file name with extension
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         // Store file in the public directory
    //         $file->move('images/products', $filename);
    //         // Add file path to the data array
    //         $data['photopath'] = $filename;
    //     }

    //     // Create the product with the validated data
    //     Product::create($data);

    //     // Redirect to products index with a success message
    //     return redirect(route('products.index'))->with('success', 'Product Created Successfully');
    // }

    public function store(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'priority' => 'required|integer|min:1|unique:products,priority', // Priority must be unique, required, and >= 1
            'product_name' => 'required|string|max:255',                     // Product name is required, must be a string
            'photopath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure the file is an image with valid MIME types
            'description' => 'required|string|max:500',                      // Description is required
            'category_id' => 'required|integer|exists:categories,id',         // Category ID must exist in the categories table
            'price' => 'required|numeric|min:0',                             // Price must be numeric and >= 0
        ]);

        // Process and store the product data
        $product = new Product();
        $product->priority = $request->priority;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;

        // Handle file upload
        if ($request->hasFile('photopath')) {
            $file = $request->file('photopath'); // Get the uploaded file
            $filename = time() . '_' . $file->getClientOriginalName(); // Create a unique filename
            $file->move(public_path('images/product'), $filename); // Store file in public/images/products
            $product->photopath = $filename; // Save the filename in the product instance
        }

        // Save the product instance to the database
        $product->save(); // Use save() instead of create() since you're already creating an instance

        return redirect(route('products.index'))->with('success', 'Product created successfully.');
    }

     public function edit($id){
     $products=Product::find($id);
    return view('products.edit',compact('products'));
    }

    public function update(Request $request, $id){

        $products=Product::find($id);
        $data = $request->validate([
           'priority'=>'required',
            'product_name'=>'required',
            'description'=>'required',
            'photopath' => 'required',
            'price'=>'required',
            'category_id'=>'required',

    ]);

    if($request->hasFile('photopath'))
    {
        $file = $request->photopath;
        //get file name with extension
        $filename = $file->getClientOriginalName();
        $filename = time().'_'.$filename;
        //store file in public
        $file->move('images/products',$filename);
        $data['photopath'] = $filename;
    }


     $products->update($data);

     return redirect(route('products.index'))->with('success','Products Updated Successfully');
      }

      public function destroy(Request $request)
      {

          $products=Product::find($request->dataid);
          $products->delete();
          return redirect (route('products.index'));
      }

      public function show($id)
      {
          // Fetch the product by ID
          $product = Product::findOrFail($id);

          // Return the product details view with the product data
          return view('products.show', compact('product'));
      }




      public function productsByCategory($id)
      {
          // Fetch all categories with their associated products
          $category = categories::find($id);
          $count=Cart::where('user_id',auth()->user()->id)->count();




          // Return to the view with categories and products
          return view('products_by_category', compact('category','count'));
      }


}





























