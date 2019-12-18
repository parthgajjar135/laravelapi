<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productarray = Product::all();
        
        return view('product.index', compact('productarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'product_details'=>'required',
            'product_price'=>'required',
            'product_qty'=>'required',
            'product__categroys_id'=>'required',
            'product_image'=>'required'

        ]);
            //get file data

            $file123 = $request->file('product_image');
            $orignal_file = $file123->getClientOriginalName();

            Storage::disk('storage')->put($orignal_file, File::get($file123));

        $productq = new Product([
            'product_name'=>$request->get('product_name'),
            'product_details'=>$request->get('product_details'),
            'product_price'=>$request->get('product_price'),
            'product_qty'=>$request->get('product_qty'),
            'product__categroys_id'=>$request->get('product__categroys_id'),
            'product_image'=> $orignal_file
        ]);

        $productq->save();
        return redirect('/product')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productarray = Product::where('product_id', $id)->first();
        return view('product.edit', compact('productarray'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'=>'required',
            'product_details'=>'required',
            'product_price'=>'required',
            'product_qty'=>'required',
            'product__categroys_id'=>'required',
            'product_image'=>'required'

        ]);

        $productarray = Product::where('product_id', $id)->first();

        $productarray->product_name = $request->get('product_name');
        $productarray->product_details = $request->get('product_details');
        $productarray->product_price = $request->get('product_price');
        $productarray->product_qty = $request->get('product_qty');
        $productarray->product__categroys_id = $request->get('product__categroys_id');
        $productarray->product_image = $request->get('product_image');

        $productarray->save();

        return redirect('/product')->with('success', 'Product has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productarray = Product::where('product_id', $id)->first();
       $image_path = storage_path('app/public/uploads').$productarray->product_image;

       //delete fle

       File::delete($image_path);   
       

       Product::where('product_id', '=', $id)->delete();

       return redirect('/product')->with('success', 'Product has been Deleted Successfully');
    }
}
