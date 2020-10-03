<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Branche;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::all();
         return view('admin.index', compact('admins'));
        //return response()->json($admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches = Branche::all();
          return view('admin.create',compact('branches'));
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
           'admins_name'=>'required',
           'admins_email'=>'required',
           'admins_phone'=>'required',
            'branches_id'=>'required'
       ]);

            $admin = new Admin([
           'admins_name' => $request->get('admins_name'),
           'admins_email' => $request->get('admins_email'),
           'admins_phone' => $request->get('admins_phone'),
           'branches_id' => $request->get('branches_id')

       ]);
       $admin->save();
       return redirect('/admin')->with('success', 'New Branch Manager saved!');
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
    public function edit($admins_id)
    {
        //
          $branches = Branche::all();
          $admin = Admin::find($admins_id);
          return view('admin.edit',compact('admin','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admins_id)
    {
        //
        $request->validate([
           'admins_name'=>'required',
           'admins_email'=>'required',
           'admins_phone'=>'required',
            'branches_id'=>'required'
       ]);

            $admin = Admin::find($admins_id);
           $admin->admins_name = $request->get('admins_name');
           $admin->admins_email = $request->get('admins_email');
           $admin->admins_phone = $request->get('admins_phone');
           $admin->branches_id = $request->get('branches_id');


       $admin->save();
       return redirect('/admin')->with('success', 'Branch manager Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($admins_id)
    {
        //
        $admin = Admin::find($admins_id);
       $admin->delete();
       return redirect('/admin')->with('success', 'Branch Manager deleted!');
    }
}
