<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TempList;
use Auth;
use App\Custom\AppFunctions;
use App\Transaction;
use App\TransactionType;
use App\DanplaList;
use App\Danpla;

class TransactionController extends Controller
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
        return Transaction::where('id',$id)->first();
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
        $t = Transaction::where('id',$id)->first();
        $t_type = TransactionType::where('id',$request->input('type_id'))->first();
        $initial = $t_type->initial;
        $t->number = $initial . substr($t->number,1,10);
        $t->type_id =  $request->input('type_id');
        $t->location_id = $request->input('location_id');
        $t->save();
        return redirect()->back()->with('success','Transaction successfully updated.');
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
    public function transact(Request $request)
    {
        $request->validate([
            'type_id' => 'required',
            'location_id' => 'required',
        ]);
        $t_number = AppFunctions::TransactionNumberGenerator($request->input('type_id'));
        $pic = Auth::user()->id;
        $danpla_temp = TempList::where('pic_id', $pic)->get();
        $danpla_total = count($danpla_temp);

        if(count($danpla_temp) > 0)
        {
            // Insert Transaction
            $transact = new Transaction;
            $transact->number = $t_number;
            $transact->pic_id = $pic;
            $transact->type_id = $request->input('type_id');
            $transact->location_id = $request->input('location_id');
            $transact->quantity = $danpla_total;
            $transact->save();

            // Get transaction id
            $t_id = Transaction::where('number',$t_number)->first();

            // Transfer danpla to DanplaList
            foreach($danpla_temp as $danpla_){
                $dl = new DanplaList;
                $dl->danpla_id = $danpla_->danpla_id;
                $dl->transaction_id = $t_id->id;
                $dl->pic_id = $pic;
                $dl->save();
            }

            // Update danpla details to Danpla
            foreach($danpla_temp as $danpla_){
                $d = Danpla::where('id',$danpla_->danpla_id)->first();
                $d->transaction_id = $t_id->id;
                $d->status_id = $request->input('type_id');
                $d->location_id = $request->input('location_id');
                $d->save();
            }

            // Delete danpla from TempList
            TempList::where('pic_id', $pic)->delete();

            return redirect()->back()->with('success','Transaction #'.$t_number.' successfully created.');
        }
        else
        {
            return redirect()->back()->with('error','No Scanned Danpla');
        }
    }
}
