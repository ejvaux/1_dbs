<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Danpla;
use App\DanplaType;
use App\DanplaStatus;
use App\Location;
use App\TransactionType;
use App\Transaction;
use App\ScrapDanpla;
use App\User;

class SearchController extends Controller
{
    public function searchdanpla($txt)
    {
        $danplas = Danpla::sortable()/* ->join('dmsdatabase.danpla_types', 'dmsdatabase.danpla_types.id', '=', 'dmsdatabase.danplas.type_id')
                        ->join('masterdatabase.dmc_customer', 'masterdatabase.dmc_customer.CUSTOMER_ID', '=', 'dmsdatabase.danplas.location_id')
                        ->join('dmsdatabase.danpla_statuses', 'dmsdatabase.danpla_statuses.id', '=', 'dmsdatabase.danplas.status_id') */
                        ->select('dmsdatabase.danplas.*'/* ,'dmsdatabase.danpla_types.name as type','masterdatabase.dmc_customer.CUSTOMER_NAME as location','dmsdatabase.danpla_statuses.name as status' */)
                        ->where(function ($query) use($txt) {
                            $query->where('dmsdatabase.danplas.barcode','like','%'.$txt.'%')
                                ->orWhere('dmsdatabase.danplas.code','like','%'.$txt.'%');
                        })                        
                        ->orderBy('id','DESC')
                        ->paginate('500');
        /* $danplas = Danpla::sortable()->orderBy('id','DESC')->paginate('500'); */
        $d_types = DanplaType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        $d_statuses = DanplaStatus::get();
        $stxt = $txt;
        return view('pages.masterlist.danplatable',compact('danplas','d_types','locations','d_statuses','stxt'));
    }
    public function searchtransaction($txt)
    {
        $transactions = Transaction::sortable()->select('transactions.*')
                        ->where(function ($query) use($txt) {
                            $query->where('transactions.number','like','%'.$txt.'%');
                        })                        
                        ->orderBy('id','DESC')
                        ->paginate('500');
        $t_types = TransactionType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        $pics = User::get();
        $stxt = $txt;
        return view('pages.masterlist.transactiontable',compact('transactions','t_types','locations','stxt','pics'));
    }
    public function searchscrap($txt)
    {
        $scraps = ScrapDanpla::sortable()->select('scrap_danplas.*')
                        ->where(function ($query) use($txt) {
                            $query->where('scrap_danplas.barcode','like','%'.$txt.'%')
                                ->orWhere('scrap_danplas.code','like','%'.$txt.'%');
                        })                        
                        ->orderBy('id','DESC')
                        ->paginate('500');
        $d_types = DanplaType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        $d_statuses = DanplaStatus::get();
        $stxt = $txt;
        return view('pages.masterlist.scraptable',compact('scraps','stxt','d_types','locations','d_statuses'));
    }
    public function searchuser($txt)
    {
        $users = User::select('users.*')
                ->where(function ($query) use($txt) {
                    $query->where('users.name','like','%'.$txt.'%');
                })                        
                ->orderBy('id','DESC')
                ->paginate('10');
        $stxt = $txt;
        return view('pages.admin.userslist',compact('users','stxt'));
    }
    public function advancesearchdanpla(Request $request)
    {        

        $danplas = Danpla::sortable()->select('dmsdatabase.danplas.*');
        if($request->input('barcode') != ''){
            $danplas = $danplas->where('barcode','like','%'.$request->input('barcode').'%');
        }
        if($request->input('code') != ''){
            $danplas = $danplas->where('code','like','%'.$request->input('code').'%');
        }
        if($request->input('type_id') != ''){
            $danplas = $danplas->where('type_id',$request->input('type_id'));
        }
        if($request->input('location_id') != ''){
            $danplas = $danplas->where('location_id',$request->input('location_id'));
        }
        if($request->input('status_id') != ''){
            $danplas = $danplas->where('status_id',$request->input('status_id'));
        }

        $danplas = $danplas->orderBy('dmsdatabase.danplas.id','DESC')->paginate('500');

        $d_types = DanplaType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        $d_statuses = DanplaStatus::get();
        return view('pages.masterlist.danplatable',compact('danplas','d_types','locations','d_statuses','stxt'));
    }
    public function advancesearchtransaction(Request $request)
    {               
        $transactions = Transaction::sortable()->select('transactions.*');
            
        if($request->input('xnumber') != ''){
            $transactions = $transactions->where('number','like','%'.$request->input('xnumber').'%');
        }
        if($request->input('xpic_id') != ''){
            $transactions = $transactions->where('pic_id',$request->input('xpic_id'));
        }
        if($request->input('xtype_id') != ''){
            $transactions = $transactions->where('type_id',$request->input('xtype_id'));
        }
        if($request->input('xlocation_id') != ''){
            $transactions = $transactions->where('location_id',$request->input('xlocation_id'));
        }

        $transactions = $transactions->orderBy('transactions.id','DESC')->paginate('500');

        $t_types = TransactionType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        $pics = User::get();
        return view('pages.masterlist.transactiontable',compact('transactions','t_types','locations','stxt','pics'));
    }
    public function advancesearchscrap(Request $request)
    {      
        $scraps = ScrapDanpla::sortable()->select('scrap_danplas.*');

        if($request->input('barcode') != ''){
            $scraps = $scraps->where('barcode','like','%'.$request->input('barcode').'%');
        }
        if($request->input('code') != ''){
            $scraps = $scraps->where('code','like','%'.$request->input('code').'%');
        }
        if($request->input('type_id') != ''){
            $scraps = $scraps->where('type_id',$request->input('type_id'));
        }
        if($request->input('location_id') != ''){
            $scraps = $scraps->where('location_id',$request->input('location_id'));
        }
        if($request->input('status_id') != ''){
            $scraps = $scraps->where('status_id',$request->input('status_id'));
        }

        $scraps = $scraps->orderBy('scrap_danplas.id','DESC')->paginate('500');

        $d_types = DanplaType::get();
        $locations = Location::orderBy('CUSTOMER_NAME')->get();
        $d_statuses = DanplaStatus::get();
        
        return view('pages.masterlist.scraptable',compact('scraps','stxt','d_types','locations','d_statuses'));
    }
}
