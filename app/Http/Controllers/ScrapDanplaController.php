<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Danpla;
use App\ScrapDanpla;
use App\ScrapTemp;
use Auth;

class ScrapDanplaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function scrap()
    {
        $pic = Auth::user()->id;
        $scrap_temp = ScrapTemp::where('pic_id', $pic)->get();

        if(count($scrap_temp)>0)
        {        
            // Transfer danpla to ScrapDanpla
            foreach($scrap_temp as $scrap_){
                $dp = Danpla::where('id',$scrap_->danpla_id)->first();
                $dl = new ScrapDanpla;
                $dl->barcode = $dp->barcode;
                $dl->code = $dp->code;
                $dl->type_id = $dp->type_id;
                $dl->location_id = $dp->location_id;
                $dl->condition_id = 2;
                $dl->status_id = $dp->status_id;
                $dl->transaction_id = $dp->transaction_id;
                $dl->created_at = $dp->created_at;
                $dl->updated_at = $dp->updated_at;
                $dl->save();
            }

            // Delete Danpla from Danpla table
            foreach($scrap_temp as $scrap_){
                Danpla::where('id',$scrap_->danpla_id)->delete();            
            }

            // Delete danpla from Scraptemp
            ScrapTemp::where('pic_id', $pic)->delete();

            return redirect()->back()->with('success','Danpla successfully transferred to Scrap.');
        }
        else
        {
            return redirect()->back()->with('error','No scanned danpla.');
        }

    }
}
