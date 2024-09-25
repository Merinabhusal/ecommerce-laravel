<?php
namespace App\Http\Controllers;

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





    public function store(Request $request) {

        $data = $request->validate([
            'priority'=>'required',
            'product_name'=>'required',
            'photopath' => 'required',
            'description'=>'required',
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

      Product::create($data);
        return redirect(route('products.index'))->with('success',' Products Created Successfully');

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


}





























