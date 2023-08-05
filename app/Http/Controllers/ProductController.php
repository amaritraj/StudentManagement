<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$product=DB::table('products')->paginate(2);
         //$product = Product::orderBy('id', 'DESC')->get()->paginate(2);
         $product = Product::paginate(5);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Product::create($request->all());

        // $notification = array(
        //     'message' => 'Student Add Successfully',
        //     'alert-type' => 'success'
        // );
        // return redirect()->route('product.index')->with($notification);

        $request->validate([
            'title'         =>'required',
            'price'         =>'required',
            'product_code'  =>'required',
            'description'   =>'required',
            'image'         =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input =  $request->all();

        if($image = $request->file('image')){
            $distinationPart = 'backend/assets/images/student/';
            $profileImage = date('Ymd'). "." .$image->getClientOriginalExtension();
            $image->move($distinationPart, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product::create($input);

        $notification = array(
            'message' => 'Student Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request, Product $product)
    {
    //     $product = Product::findOrFail($id);
    //     $product->update($request->all());

    //     $notification = array(
    //         'message' => 'Student Updated Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('product.index')->with($notification);

        $request->validate([
            'title'         =>'required',
            'price'         =>'required',
            'product_code'  =>'required',
            'description'   =>'required',
            'image'         =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input =  $request->all();

        if($image = $request->file('image')){
            $distinationPart = 'backend/assets/images/student/';
            $profileImage = date('Ymd'). "." .$image->getClientOriginalExtension();
            $image->move($distinationPart, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $product->update($input);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */

    //Sinal Data Delete
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $notification = array(
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

    //Multipul Data only Delete Fnally
    // public function alldestroy(Request $request)
    // {
    //     $ids = $request->ids;
    //     Product::whereIn('id', $ids)->delete();

    //     $notification = array(
    //         'message' => 'Product Selete Data Deleted Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('product.index')->with($notification);
    // }

    //Sinal Data only Delete
    public function singdestroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

    //Edit Data and Photo Product List Show Success
    public function edit_product(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit_product', compact('product'));
    }
    //Upload Data and Photo Success
    public function update_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'title'         =>'required',
            'price'         =>'required',
            'product_code'  =>'required',
            'description'   =>'required',
        ]);

        $input =  '';
        $deleteoldImage = 'backend/assets/images/student/'.$product->image;

        if($image = $request->file('image')){

            if(file_exists($deleteoldImage)){
                File::delete($deleteoldImage);
            }

            $input = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $distinationPart = 'backend/assets/images/student/';
            // $profileImage = date('Ymd'). "." .$image->getClientOriginalExtension();
            $image->move($distinationPart, $input);
            // $input['image'] = "$profileImage";
        }else{
            $input =  $product->image;
        }

        $product = Product::where('id', $id)->update([
            'title'         =>$request->title,
            'price'         =>$request->price,
            'product_code'  =>$request->product_code,
            'description'   =>$request->description,
            'image'         =>$input,
        ]);

        $notification = array(
            'message' => 'Edit Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

    //Delete Data and Photo Success
    public function delete_product(string $id)
    {
        $product = Product::findOrFail($id);
        $deleteoldImage = 'backend/assets/images/student/'.$product->image;
        if(file_exists($deleteoldImage)){
            File::delete($deleteoldImage);
        }
        $product->delete();

        $notification = array(
            'message' => 'Deleted Product Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }



}
