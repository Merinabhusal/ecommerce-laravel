<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority'=>'required',
            'product_name'=>'required',
             'description'=>'required',
            'photopath' => 'required',
            'price'=>'required',
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

    //   public function show()
    //   {
    //     $products = Product::where('id')->firstOrFail();

    //       return view('products.show', compact('products'));
    //   }


      public function show($id) {
        $products = Product::where('id')->firstOrFail();
       if (!$products) {
            abort(404, 'Product not found');
        }

        return view('products.show', compact('products'));
    }






}





















