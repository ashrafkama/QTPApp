<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $request->validate([
            'categories_name'=>'required',
        ]);
          $categories = new Categories([
            'categories_name' => $request->get('categories_name'),
        ]);
        $categories->save();
        return redirect('/category')->with('success', 'Category saved!');
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
    public function edit($categories_id)
    {
        //
        $categories = Categories::find($categories_id);
     return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categories_id)
    {
        //
        $request->validate([
      'categories_name'=>'required',
  ]);
  $categories = Categories::find($categories_id);
    $categories->categories_name =  $request->get('categories_name');
  $categories->save();
  return redirect('/category')->with('success', 'Category  updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categories_id)
    {
        //
        $categories = Categories::find($categories_id);
       $categories->delete();
       return redirect('/category')->with('success', 'Category deleted!');
    }
}
