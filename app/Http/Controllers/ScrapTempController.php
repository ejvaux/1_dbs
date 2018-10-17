<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScrapTemp;
use App\Danpla;
use Auth;

class ScrapTempController extends Controller
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
        $danpla = Danpla::where('barcode',$request->input('barcode'))->first();
        if(!empty($danpla))
        {   
            $chk = ScrapTemp::where('danpla_id',$danpla->id)->where('pic_id',Auth::user()->id)->first();
            if($chk === null)
            {
                $i = new ScrapTemp;
                $i->danpla_id = $danpla->id;
                $i->pic_id = Auth::user()->id;
                $i->save();
                return 0;
            }
            else{
                return 2;
            }            
        }
        else{
            return 1;
        }
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
        ScrapTemp::where('id',$id)->delete();
        return 0;
    }
}
