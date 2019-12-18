<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productarray = Category::all();
        
        return view('category.index', compact('productarray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'cat_name'=>'required',
            'cat_active'=>'required'

        ]);

        $productq = new Category([
            'cat_name'=>$request->get('cat_name'),
            'cat_active'=>$request->get('cat_active')
        ]);

        $productq->save();
        return redirect('/category');
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
        $productarray = Category::where('cat_id', $id)->first();
        return view('category.edit', compact('productarray'));
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
            'cat_name'=>'required',
            'cat_active'=>'required'

        ]);

        $productarray = Category::where('cat_id', $id)->first();

        $productarray->cat_name = $request->get('cat_name');
        $productarray->cat_active = $request->get('cat_active');

        $productarray->save();

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('cat_id', '=', $id)->delete();

        return redirect('/category');
    }
}
