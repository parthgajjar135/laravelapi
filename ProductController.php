<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function staticdemo1()
    {
        $productdata  = [
            "id" => "1",
            "name" => "iPhone",
            "price" => "85000",
            "amount" => "850",
          ];

          return response()->json($productdata);
    }


    public function adddemo (Request $request)
    {
        $productname = $request->get('txt1');
        $productdetails = $request->get('txt2');
        $productamount = $request->get('txt3');
        $productarray =  DB::table('products')->insert(
            ['name' => $productname, 'price' => $productdetails ,'amount'=>$productamount]
        );
        return response()->json($productarray);
    }
    public function shows()
    {
        $productarray = Product::all();
        return response()->json($productarray);
    }

    // public function dynamicdemo2($id)
    // {
    //     $productarray =  Product::where('id',  $id)->first();
    //     return response()->json($productarray);
    // }
   
    public function update(Request $request,$id)
    {
        $productname = $request->get('txt1');
        $productdetails = $request->get('txt2');
        $productamount = $request->get('txt3');
        $productarray =  DB::table('products')->where('id',$id)->update(
            ['name' => $productname,
             'price' => $productdetails ,
             'amount'=>$productamount]
        );
        $request = [
            'success' => true,
            'message' => "Record updated",
            'data' => $productarray,
            ];
        return response()->json($request);
    }
   
    public function destroy($id)
    {
     
        $productarray = DB::table('products')->where('id','=',$id)->delete();
       

        $response = [
            'success' => true,
            'message' => "Recor deleted",
            'data' => $productdata,
            ];

            return response()->json($productarray);
    }
    
}
