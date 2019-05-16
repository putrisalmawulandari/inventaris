<?php

namespace App\Http\Controllers;

use App\Borrow;
use Illuminate\Http\Request;
use Auth;
use App\Employee;
use Carbon\Carbon;
use App\Item;
use App\User;
use Log;


class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('web')->check())
        {
            Log::info("Saha wae");

            $data = Borrow::latest()->get();
        }else if(Auth::guard('employee')->check()){
            $data = Borrow::where('employee_id',Auth::guard('employee')->user()->id)->latest()->get();
        }else{
            return redirect()->route('login');
        }

        return view('pages.borrow.index',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guard('web')->check())
        {
            return view('pages.borrow.create',[
                'employees'=>Employee::latest()->get(),
            ]);
        }else{
            return view('pages.borrow.create');
        }
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
            'employee_id'=>'required',
            'borrow_date'=>'required',
            'count_days'=>'required',
        ]);

        $carbon = Carbon::now();

        if(Auth::guard('web')->check())
        {
            $borrow = new Borrow($request->all());
            $borrow->user_id = Auth::user()->id;
            $borrow->status == "uncomplete";
            $borrow->approve = 1;
            $borrow->return_date = $carbon->addDays($request->count_days);
            $borrow->save();
        }else{
            $borrow = new Borrow($request->all());
            $borrow->status == "uncomplete";
            $borrow->approve = 0;
            $borrow->return_date = $carbon->addDays($request->count_days);
            $borrow->save();
        }
        
        return redirect()->route('borrow.show',$borrow)->withMessage('Next Form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    { 
        return view('pages.borrow.next',[
            'data'=>$borrow,
            'items'=>Item::where('total','>','0')->latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        if(Auth::guard('web')->check())
        {
            $borrow->update([
                'status'=>'borrowed',
            ]);
            return redirect()->route('borrow.index')->withMessage('Borrow Has Been Created');
        }elseif(Auth::guard('employee')->check()){
            $borrow->update([
                'status'=>'book',
            ]);
        }
        return redirect()->route('borrow.index')->withMessage('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Borrow $borrow)
    {
        if($request->approve == "1")
        {
            $borrow->update([
                'status'=>'borrowed',
                'user_id'=>Auth::user()->id,
            ]);

        }elseif($request->approve == "0")
        {
            foreach($borrow->cart as $field)
            {
                $item = Item::find($field->item_id);
                $item->total = $item->total + $field->total;
                $item->save();
            }

            $borrow->update([
                'status'=>'denied',
                'user_id'=>Auth::user()->id,
            ]);
        }
        return redirect()->back();
    }

    public function detail(Borrow $borrow)
    {
        return view('pages.borrow.detail',[
            'data'=>$borrow,
        ]);
    }
}
