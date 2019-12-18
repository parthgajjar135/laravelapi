<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productarray = Product::all();
        
        return view('form.index', compact('productarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
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

            Storage::disk('storage')->put($orignal_file, File::get($file123));

        $productq = new Product([
            'product_name'=>$request->get('product_name'),
            'product_details'=>$request->get('product_details'),
            'product_price'=>$request->get('product_price'),
            'product_qty'=>$request->get('product_qty'),
            'subcat_id'=>$request->get('subcat_id'),
            'product_image'=> $orignal_file
        ]);

        $productq->save();
        return redirect('/form')->with('success', 'Product has been added');
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
        return view('form.edit', compact('productarray'));
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

        Storage::disk('storage')->put($orignal_file, File::get($file123));

        $productarray = Product::where('product_id', $id)->first();

        $productarray->product_name = $request->get('product_name');
        $productarray->product_details = $request->get('product_details');
        $productarray->product_price = $request->get('product_price');
        $productarray->product_qty = $request->get('product_qty');
        $productarray->subcat_id = $request->get('subcat_id');
        $productarray->product_image = $orignal_file;

        $productarray->save();

        return redirect('/form')->with('success', 'Product has been Updated');
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
       $image_path = storage_path('app/public/uploads/').$productarray->product_image;

       //delete fle

       File::delete($image_path);
       
       
        //if field name is id then use below method to delete
        //$product = Product::find($id);
        //$product->delete();

       Product::where('product_id', '=', $id)->delete();

       return redirect('/form')->with('success', 'Product has been Deleted Successfully');
    }
}
