<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Danpla;
use App\DanplaList;
use App\DanplaType;
use App\DanplaStatus;
use App\Transaction;
use App\TransactionType;
use App\ScrapDanpla;
use App\Location;

class MasterlistController extends Controller
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
        
        return view('pages.masterlist',compact('danplas'));
    }
    public function danpla()
    {
        $danplas = Danpla::sortable()->orderBy('id','DESC')->paginate('500');
        $d_types = DanplaType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        $d_statuses = DanplaStatus::get();
        return view('pages.masterlist.danplatable',compact('danplas','d_types','locations','d_statuses'));
    }
    public function transaction()
    {
        $transactions = Transaction::sortable()->orderBy('id')->paginate('500');
        $t_types = TransactionType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        return view('pages.masterlist.transactiontable',compact('transactions','t_types','locations'));
    }
    public function scrap()
    {
        $scraps = ScrapDanpla::sortable()->orderBy('id')->paginate('500');
        return view('pages.masterlist.scraptable',compact('scraps'));
    }
    public function transactiondanpla($id)
    {
        /* $transaction = Transaction::where('id',$id)->first(); */
        $t_danplas = DanplaList::sortable()->where('transaction_id',$id)->orderBy('id')->get();
        return view('pages.masterlist.transactiondanplalist',compact('t_danplas'));
    }
}