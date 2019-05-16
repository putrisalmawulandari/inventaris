<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.report.index');
    }
    
    public function createjangka()
    {
        return view('pages.report.createjangka');
    }

    public function jangka(Request $request)
    {
        return view('pages.report.jangka',[
            'data'=>Borrow::whereBetween('borrow_date',[$request->date_first,$request->date_last])->latest()->get(),
            'date_first'=>$request->date_first,
            'date_last'=>$request->date_last,
        ]);
    }
    
}
