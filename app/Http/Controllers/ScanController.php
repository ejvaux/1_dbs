<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\TempList;
use Auth;
use DB;
use App\TransactionType;
use App\ScrapDanpla;
use App\ScrapTemp;

class ScanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.scan');
    }
    public function templist()
    {
        $danplas = TempList::where('pic_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('pages.scan.inc_danplalist',compact('danplas'));
    }
    public function inout()
    {
        /* $locations = Location::orderBy('CUSTOMER_NAME','ASC')->get(); */ 
        $locations = DB::select('SELECT CUSTOMER_NAME, CUSTOMER_ID FROM masterdatabase.dmc_customer GROUP BY CUSTOMER_NAME');     
        $types = TransactionType::orderBy('id')->get();
        $danplas = TempList::where('pic_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('pages.scan.transactionmaster',compact('locations','danplas','types'));
    }
    public function scrap()
    {
        $danplas = ScrapTemp::where('pic_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('pages.scan.scraplist',compact('danplas'));;
    }
    public function templist2()
    {
        $danplas = ScrapTemp::where('pic_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('pages.scan.scraptemplist',compact('danplas'));
    }
}
