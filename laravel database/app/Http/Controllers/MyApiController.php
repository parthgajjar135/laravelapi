<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
class MyApiController extends Controller
{
    public function staticdemo()
    {
        $catdata  = [
            "cat_id" => "5",
        "cat_name" => "iPhone",
        "cat_active" => "1",
          ];
        $response = [
            'success' => true,
            'message' => "Record Found",
            'data' => $catdata,
            ];
            return response()->json($response, 200);
    }

    public function dynamicdemo1()
    {
        $catarray = Category::all();
        $response = [
            'success' => true,
            'message' => "Record Found",
            'data' => $catarray,
            ];
        return response()->json($response);
    }

    public function dynamicdemo2($id)
    {
        $catarray =  Category::where('cat_id',  $id)->first();
        $response = [
            'success' => true,
            'message' => "Record Found",
            'data' => $catarray,
            ];
        return response()->json($response);
    }

    public function apidemo (Request $request)
    {
        $catname = $request->get('cat_name');
        $catactive = $request->get('cat_active');
        $catarray =  DB::table('categories')->insert(
            ['cat_name' => $catname, 'cat_active' => $catactive ]
        );

        $response = [
            'success' => true,
            'message' => "Data Inserted Succsesfully",
            'data' => $catarray,
            ];
        return response()->json($response);
    }

    public function apidemo1()
    {
        $catarray = DB::table('categories')->get();
        $response = [
            'success' => true,
            'message' => "Record Found",
            'data' => $catarray,
            ];
        return response()->json($response);
    }

    public function apiid($id)
    {
        $catarray = DB::table('categories')->where('cat_id',  $id)->first();
        $response = [
            'success' => true,
            'message' => "Record Found",
            'data' => $catarray,
            ];
        return response()->json($response);
    }

    public function apiupdate(Request $request, $id)
    {

        $catname = $request->get('cat_name');
        $catactive = $request->get('cat_active');
        $catarray = DB::table('categories')->where('cat_id', $id)->update(
            ['cat_name' => $catname, 'cat_active' => $catactive ]
        );
        
        $request = [
            'success' => true,
            'message' => "Record Updated",
            'data' => $catarray,
            ];
        return response()->json($request);
    }

    public function apidel($id)
    {
        $catarray = DB::table('categories')->where('cat_id', '=', $id)->delete();
        $response = [
            'success' => true,
            'message' => "Record Deleted",
            'data' => $catarray,
            ];
        return response()->json($response);
    }
}
