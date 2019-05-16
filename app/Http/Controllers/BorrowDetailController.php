<?php

namespace App\Http\Controllers;

use App\BorrowDetail;
use Illuminate\Http\Request;
use App\Item;
use App\Borrow;
use App\Maintenance;
class BorrowDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'item_id'=>'required',
            'borrow_id'=>'required',
            'total'=>'required|numeric|min:1',
        ]);

        $item = Item::find($request->item_id);
        // return $item->total;
        if($item->total < $request->total)
        {
            return back()->withInfo('Input nya Kenbanyakan');
        }else{
            $borrowDetail = BorrowDetail::where([
                'borrow_id'=>$request->borrow_id,
                'item_id'=>$request->item_id,
            ]);
            if($borrowDetail->count() > 0)
            {
                $borrowDetail->update([
                    'total'=>$borrowDetail->first()->total + $request->total,
                ]);
            }else{
                BorrowDetail::create($request->all());
            }

            // $item->update([
            //     'total'=>$item->total - $request->total,
            // ]);
            $item->total = $item->total - $request->total;
            $item->save();
            
            return back()->with('message','Berhasil Menambahkan Ke Keranjang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function show($borrow)
    {
        return view('pages.borrow.return',[
            'data'=>Borrow::find($borrow),
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowDetail $borrowDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$borrow)
    {
        for($i = 0;$i < count($request->total);$i++)
        {
            if($request->total[$i] < $request->total_broken[$i])
            {
                return back()->withInfo('Too Many Item');
            }
        }

        for($i = 0;$i < count($request->total);$i++)
        {
            $current = $request->total[$i] - $request->total_broken[$i];
            $item    = Item::find($request->item_id[$i]);
            $item->total = $item->total + $current;
            $item->save();

            if($request->total_broken[$i] > 0)
            {
                Maintenance::create([
                    'borrow_id'=>$borrow,
                    'item_id'=>$request->item_id[$i],
                    'total'=>$request->total[$i],
                    'description'=>$request->description[$i],
                    'broken_date'=>date("Y-m-d"),
                ]);
            }
        }

        Borrow::find($borrow)->update(['status'=>'returned']);
        return redirect()->route('borrow.index')->withMessage('Item Succesfully Returned');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($borrowDetail)
    {
        $detail = BorrowDetail::find($borrowDetail);
        $item = Item::find($request->item_id);

        $detail->update([
            'total'=>$item->total + $detail->total,
        ]);

        $detail->delete();
    }
}
