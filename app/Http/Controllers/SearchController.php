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
        $stxt = $txt;
        return view('pages.masterlist.transactiontable',compact('transactions','t_types','locations','stxt'));
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
        $stxt = $txt;
        return view('pages.masterlist.scraptable',compact('scraps','stxt'));
    }
}
