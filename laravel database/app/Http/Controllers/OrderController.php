<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderarray = Order::all();
        
        return view('order.index', compact('orderarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
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
            'user_id'=>'required',
            'ord_status'=>'required',
            'ship_name'=>'required',
            'ship_no'=>'required',
            'ship_address'=>'required'
            

        ]);

        

        $productq = new Order([
            'user_id'=>$request->get('user_id'),
            'ord_status'=>$request->get('ord_status'),
            'ship_name'=>$request->get('ship_name'),
            'ship_no'=>$request->get('ship_no'),
            'ship_address'=>$request->get('ship_address')
            
        ]);

        $productq->save();
        return redirect('/order')->with('success', 'Order has been Conformed');
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
        $orderarray = Order::where('ord_id', $id)->first();
        return view('order.edit', compact('orderarray'));
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
            'user_id'=>'required',
            'ord_status'=>'required',
            'ship_name'=>'required',
            'ship_no'=>'required',
            'ship_address'=>'required'
            

        ]);

        $orderarray = Order::where('ord_id', $id)->first();

        $orderarray->user_id = $request->get('user_id');
        $orderarray->ord_status = $request->get('ord_status');
        $orderarray->ship_name = $request->get('ship_name');
        $orderarray->ship_no = $request->get('ship_no');
        $orderarray->ship_address = $request->get('ship_address');

        $orderarray->save();

        return redirect('/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('ord_id', '=', $id)->delete();

       return redirect('/order')->with('success', 'Order has been Deleted Successfully');
    }
}
