<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Danpla;
use App\DanplaType;
use App\DanplaStatus;
use App\Location;
use App\Custom\AppFunctions;
use App\Exports\DanplaExport;
use Maatwebsite\Excel\Facades\Excel;

class DanplaController extends Controller
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
        for ($x = 1; $x <= $request->input('box'); $x++) 
        {
            $ds = AppFunctions::DanplaSeriesGenerator($request->input('type_id'));
            $dc = AppFunctions::DanplaCodeGenerator($request->input('type_id'));
            $d = new Danpla;
            $d->barcode = $ds;
            $d->code = $dc;
            $d->type_id = $request->input('type_id');
            $d->location_id = 31;
            $d->condition_id = 1;
            $d->status_id = 1;
            $d->save();
        }

        return redirect()->back()->with('success',$request->input('box').' danpla successfully created.');
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
        return $danpla = Danpla::where('id',$id)->first();
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
        $d = Danpla::where('id',$id)->first();
        $d->barcode = $request->input('barcode');
        $d->code = $request->input('code');
        $d->type_id = $request->input('type_id');
        $d->location_id = $request->input('location_id');
        $d->status_id = $request->input('status_id');
        $d->save();
        return redirect()->back()->with('success','Danpla Details successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Danpla::where('id',$id)->delete();
        return redirect()->back()->with('success','Danpla successfully deleted.');
    }
    public function exportall(Request $request) 
    {
        return /* Excel::download(new DanplaExport, 'Danpla Master List.xlsx'); */
            (new DanplaExport(
                $request->input('barcode'),
                $request->input('code'),
                $request->input('type_id'),
                $request->input('location_id'),
                $request->input('status_id')
                ))->download('Danpla Master List.xlsx');
    }
}