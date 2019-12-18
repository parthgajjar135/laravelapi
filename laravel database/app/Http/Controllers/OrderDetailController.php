<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
use App\Order;
use App\Product;
class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderdetail_array = OrderDetail::join('orders', 'order_details.ord_id', '=', 'orders.ord_id')
        ->select('order_details.*', 'orders.ship_name')
        ->get();

        $orderdetailarray = OrderDetail::join('products', 'order_details.product_id', '=', 'products.product_id')
        ->select('order_details.*', 'products.product_name')
        ->get();
        
        return view('orderdetail.index', compact('orderdetail_array', 'orderdetailarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderdetail_array = Order::all();

        $orderdetailarray = Product::all();
        
        return view('orderdetail.create', compact('orderdetail_array', 'orderdetailarray'));
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
            'ord_id'=>'required',
            'product_id'=>'required',
            'product_qty'=>'required',
            'product_price'=>'required'
            
        ]);

        $productq = new OrderDetail([
            'ord_id'=>$request->get('ord_id'),
            'product_id'=>$request->get('product_id'),
            'product_qty'=>$request->get('product_qty'),
            'product_price'=>$request->get('product_price')
        ]);

        $productq->save();
        return redirect('/orderdetail');
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
        $orderdetailarray = OrderDetail::where('od_id', $id)->first();
        return view('orderdetail.edit', compact('orderdetailarray'));
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
            'ord_id'=>'required',
            'product_id'=>'required',
            'product_qty'=>'required',
            'product_price'=>'required'
            
        ]);

        $orderdetailarray = OrderDetail::where('od_id', $id)->first();

        $orderdetailarray->ord_id = $request->get('ord_id');
        $orderdetailarray->product_id = $request->get('product_id');
        $orderdetailarray->product_qty = $request->get('product_qty');
        $orderdetailarray->product_price = $request->get('product_price');

        $orderdetailarray->save();

        return redirect('/orderdetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderDetail::where('od_id', '=', $id)->delete();

        return redirect('/orderdetail');
    }
}
