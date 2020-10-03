<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Branche;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branches = Branche::all();
        return view('branche.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      return view('branche.create');

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
            'branches_name'=>'required',
            'branches_location'=>'required',

        ]);
          $branche = new Branche([
            'branches_name' => $request->get('branches_name'),
            'branches_location' => $request->get('branches_location'),

        ]);
        $branche->save();
        return redirect('/branche')->with('success', 'branch saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($branches_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($branches_id)
    {
        //
        $branche = Branche::find($branches_id);
     return view('branche.edit', compact('branche'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $branches_id)
    {
        //
        $request->validate([
      'branches_name'=>'required',
      'branches_location'=>'required'
  ]);
  $branche = Branche::find($branches_id);
    $branche->branches_name =  $request->get('branches_name');
  $branche->branches_location =  $request->get('branches_location');

  $branche->save();
  return redirect('/branche')->with('success', 'Branch  updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($branches_id)
    {
        //
        $branche = Branche::find($branches_id);
       $branche->delete();
       return redirect('/branche')->with('success', 'Branch deleted!');
    }
}
