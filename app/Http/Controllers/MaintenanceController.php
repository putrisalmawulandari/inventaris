<?php

namespace App\Http\Controllers;

use App\Maintenance;
use Illuminate\Http\Request;
use App\Item;
class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.maintenance.index',[
            'data'=>Maintenance::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return view('pages.maintenance.show',[
            'data'=>$maintenance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $this->validate($request,[
            'total_broken'=>'required',
            'total'=>'required',
        ]);

        if($request->total_broken < $request->total)
        {
            return back()->withInfo('Too Many Items');
        }else{
            $maintenance->update([
                'fixed'=>$request->total,
                'fix_date'=>date("Y-m-d"),
            ]);

            $item = Item::find($maintenance->item->id);
            $item->total = $item->total + $request->total;
            $item->save();

            return redirect()->route('maintenance.index')->withMessage('Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
