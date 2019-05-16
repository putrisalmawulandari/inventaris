<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Hash;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.employee.index',[
            'data'=>Employee::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nip'=>'required|numeric|unique:employees',
            'name'=>'required',
            'address'=>'required',
        ]);

        $employee = new Employee($request->all());
        $employee->password = Hash::make($request->nip);
        $employee->save();
        return back()->withMessage('Success');
    }

   
    public function show(Employee $employee)
    {
        //
    }

    
    public function edit(Employee $employee)
    {
        return view('pages.employee.edit',[
            'data'=>$employee,
        ]);
    }

   
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
        ]);

        $employee->update($request->except('_token','_method'));
        return redirect()->route('employee.index')->withMessage('Updated');
    }

   
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->withMessage('Deleted');
    }

    public function home()
    {
        return view('home');
    }
}
