<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workinginsert()
    {
        $productdata  = [
            "id" => "1",
            "name" => "iPhone",
            "email" => "iPhone@gmial.com",
            "password" => "password",

          ];
          $response = [
            'success' => true,
            'message' => "Record Found",
            'data' => $productdata,
            ];
            return response()->json($response, 200);

    }
    public function update()
    {
        $productarray = DB::table('users')->get();
        return response()->json($productarray);
    }

    public function shows()
    {
        $productarray = DB::table('users')->get();
        return response()->json($productarray);
    }
}
