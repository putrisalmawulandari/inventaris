<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.type.index',[
            'data'=>Type::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.type.create');
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
            'name'=>'required',
            'description'=>'required',
        ]);

        Type::create($request->all());
        return back()->withMessage('Success');
    }

   
    public function show(Type $type)
    {
        //
    }

    
    public function edit(Type $type)
    {
        return view('pages.type.edit',[
            'data'=>$type,
        ]);
    }

   
    public function update(Request $request, Type $type)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
        ]);

        $type->update($request->except('_token','_method'));
        return redirect()->route('type.index')->withMessage('Updated');
    }

   
    public function destroy(Type $type)
    {
        $type->delete();
        return back()->withMessage('Deleted');
    }
}
