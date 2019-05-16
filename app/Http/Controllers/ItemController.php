<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
use App\Room;
use App\Type;
use App\User;
use Carbon\Carbon;
use Log;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('message');
        return view('pages.item.index',[
            'data'=>Item::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.item.create',[
            'types'=>Type::all(),
            'rooms'=>Room::all(),
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
            'name'=>'required',
            'description'=>'required',
            'total'=>'required',
            'type_id'=>'required',
            'room_id'=>'required',
        ]);

        $item = new Item($request->all());
        $item->registration_date = Carbon::now();
        $item->user_id = Auth::user()->id;
        $item->save();

        return back()->withMessage('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('pages.item.edit',[
            'data'=>$item,
            'rooms'=>Room::all(),
            'types'=>Type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'type_id'=>'required',
            'room_id'=>'required',
        ]); 

        $item->update($request->except('_method','_token'));
        return redirect()->route('item.index')->withMessage('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back()->withMessage('Item Deleted');
    }
}
