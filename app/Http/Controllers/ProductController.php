<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
          return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categories::all();
          return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           'products_name'=>'required',
           'products_dis'=>'required',
           'categories_id'=>'required',
       ]);

            $product = new Product([
           'products_name' => $request->get('products_name'),
           'products_dis' => $request->get('products_dis'),
           'categories_id' => $request->get('categories_id'),
       ]);
       $product->save();
       return redirect('/product')->with('success', 'New Product saved!');
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
    public function edit($products_id)
    {
        //
        $categories = Categories::all();
        $product = Product::find($products_id);
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products_id)
    {
        //
        $request->validate([
           'products_name'=>'required',
           'products_dis'=>'required',
           'categories_id'=>'required',
       ]);

            $product = Product::find($products_id);
           $product->products_name = $request->get('products_name');
           $product->products_dis = $request->get('products_dis');
           $product->categories_id = $request->get('categories_id');



       $product->save();
       return redirect('/product')->with('success', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($products_id)
    {
        //
        $product = Product::find($products_id);
       $product->delete();
       return redirect('/product')->with('success', 'Product deleted!');
    }
}
