<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Join Query
        
        $productarray = Product::join('sub_categories', 'products.subcat_id', '=', 'sub_categories.subcat_id')
        ->select('products.*', 'sub_categories.subcat_name')
        ->get();
        
        return view('product.index', compact('productarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcat_array = SubCategory::all();
        
        return view('product.create', compact('subcat_array'));
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
            'subcat_id'=>'required',
            'product_image'=>'required'

        ]);

        //get file data

        $file123 = $request->file('product_image');

        //file inbuild function

        //$extention = $file123->getClientOrginalExtention();
        //$mimetype = $file123->getClientMimeType();
        //$getfilename = $file123->getFilename();

        //we use orignal file name

        $orignal_file = $file123->getClientOriginalName();

        //upload file on public folder

        Storage::disk('public')->put($orignal_file, File::get($file123));

        $productq = new Product([
            'product_name'=>$request->get('product_name'),
            'product_details'=>$request->get('product_details'),
            'product_price'=>$request->get('product_price'),
            'product_qty'=>$request->get('product_qty'),
            'subcat_id'=>$request->get('subcat_id'),
            'product_image'=> $orignal_file
        ]);

        $productq->save();
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productarray = Product::where('product_id', $id)->first();
        return view('product.edit', compact('productarray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'=>'required',
            'product_details'=>'required',
            'product_price'=>'required',
            'product_qty'=>'required',
            'subcat_id'=>'required',
            'product_image'=>'required'

        ]);

        //get file data

        $file123 = $request->file('product_image');

        //file inbuild function

        //$extention = $file123->getClientOrginalExtention();
        //$mimetype = $file123->getClientMimeType();
        //$getfilename = $file123->getFilename();

        //we use orignal file name

        $orignal_file = $file123->getClientOriginalName();

        //upload file on public folder

        Storage::disk('public')->put($orignal_file, File::get($file123));

        $productarray = Product::where('product_id', $id)->first();

        $productarray->product_name = $request->get('product_name');
        $productarray->product_details = $request->get('product_details');
        $productarray->product_price = $request->get('product_price');
        $productarray->product_qty = $request->get('product_qty');
        $productarray->subcat_id = $request->get('subcat_id');
        $productarray->product_image = $orignal_file;

        $productarray->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //find image path

       $productarray = Product::where('product_id', $id)->first();
       $image_path = public_path('storage/uploads/').$productarray->product_image;

       //delete fle

       File::delete($image_path);   
        
        Product::where('product_id', '=', $id)->delete();

        return redirect('/product');
    }
}
