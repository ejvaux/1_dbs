<?php

namespace App\Custom;

use App\Transaction;
use App\TransactionType;
use App\DanplaType;
use App\Danpla;

class AppFunctions
{   
    public static function TransactionNumberGenerator($typ)
    {
        $month = date('m');
        $year = date('Y');
        $day = date('d');
        $type = TransactionType::where('id',$typ)->first();
        $series = Transaction::orderBy('number','DESC')->first();
        if(empty($series)){
            return $type->initial.$year.$month.$day . "01";
        }
        else{
            $tnum = $series->number;
            $yr = substr($tnum,1,4);
            $mnth = substr($tnum,5,2);
            $dy = substr($tnum,7,2);
            $num = substr($tnum,-2);
            if($yr == $year && $mnth == $month && $dy == $day){
                return $type->initial . substr($tnum,1,8) . str_pad($num+1, 2, '0', STR_PAD_LEFT);
            }
            else if($yr != $year || $mnth != $month || $dy != $day){
                return $type->initial.$year.$month.$day . "01";
            }
        }
    }
    public static function DanplaSeriesGenerator($type)
    {
        $month = date('m');
        $year = date('y');
        $day = date('d');
        $d_type = DanplaType::where('id',$type)->first();
        $bcode = $year.$month.$day.$d_type->initial;
        $series = Danpla::where('barcode','LIKE', $bcode.'%')->orderBy('barcode','DESC')->first();
        if(empty($series)){
            return $bcode . "0001";
        }
        else{
            $tnum = $series->barcode;
            $nnum = substr($tnum,0,7);
            $num = substr($tnum,-4);
            
            return $nnum . str_pad($num+1, 4, '0', STR_PAD_LEFT);;
        }
    }
    public static function DanplaCodeGenerator($type)
    {
        $month = date('m');
        $year = date('y');
        $bcode = $year.'-'.$month.'-';
        $series = Danpla::where('code','LIKE', $bcode.'%')->orderBy('code','DESC')->first();
        if(empty($series)){
            return $bcode . "0001";
        }
        else{
            $tnum = $series->code;
            $nnum = substr($tnum,0,6);
            $num = substr($tnum,-4);
            
            return $nnum . str_pad($num+1, 4, '0', STR_PAD_LEFT);;
        }
    }
}