<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Level;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index',[
            'data'=>User::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create',[
            'levels'=>Level::all(),
        ]);
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
            'email'=>'required|unique:users',
            'name'=>'required',
            'level_id'=>'required',
        ]);

        $user = new User($request->all());
        $user->password = Hash::make("inven123");
        $user->save();
        return back()->withMessage('Success');
    }

   
    public function show(User $user)
    {
        //
    }

    
    public function edit(User $user)
    {
        return view('pages.user.edit',[
            'data'=>$user,
            'levels'=>Level::all(),
        ]);
    }

   
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name'=>'required',
            'level_id'=>'required',
        ]);

        $user->update($request->except('_token','_method'));
        return redirect()->route('user.index')->withMessage('Updated');
    }

   
    public function destroy(User $user)
    {
        $user->delete();
        return back()->withMessage('Deleted');
    }
}
