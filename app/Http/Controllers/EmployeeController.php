<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branche;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::all();
          return view('employee.index', compact('employees'));
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
          return view('employee.create',compact('branches'));
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
           'employees_name'=>'required',
           'employees_email'=>'required',
           'employees_phone'=>'required',
            'branches_id'=>'required'
       ]);

            $admin = new Employee([
           'employees_name' => $request->get('employees_name'),
           'employees_email' => $request->get('employees_email'),
           'employees_phone' => $request->get('employees_phone'),
           'branches_id' => $request->get('branches_id')

       ]);
       $admin->save();
       return redirect('/employee')->with('success', 'New Employee saved!');
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
    public function edit($employees_id)
    {
        //
        $branches = Branche::all();
        $employee = Employee::find($employees_id);
        return view('employee.edit',compact('employee','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employees_id)
    {
        //
        $request->validate([
           'employees_name'=>'required',
           'employees_email'=>'required',
           'employees_phone'=>'required',
            'branches_id'=>'required'
       ]);

            $employee = Employee::find($employees_id);
           $employee->employees_name = $request->get('employees_name');
           $employee->employees_email = $request->get('employees_email');
           $employee->employees_phone = $request->get('employees_phone');
           $employee->branches_id = $request->get('branches_id');


       $employee->save();
       return redirect('/employee')->with('success', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employees_id)
    {
        //
        $employee = Employee::find($employees_id);
       $employee->delete();
       return redirect('/employee')->with('success', 'Employee deleted!');
    }
}
