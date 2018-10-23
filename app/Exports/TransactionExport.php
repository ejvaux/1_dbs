<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'TRANSACTION #',
            'TYPE',
            'LOCATION',
            'QUANTITY',
            'PIC',
        ];
    }

    public function __construct($tnum = '',$pic = '',$type = '',$location = '')
    {
        $this->tnum = $tnum;
        $this->pic = $pic;
        $this->type = $type;
        $this->location = $location;
    }

    public function query()
    {
        $query = Transaction::join('dmsdatabase.transaction_types', 'dmsdatabase.transaction_types.id', '=', 'dmsdatabase.transactions.type_id')
                    ->join('masterdatabase.dmc_customer', 'masterdatabase.dmc_customer.CUSTOMER_ID', '=', 'dmsdatabase.transactions.location_id')
                    ->join('dmsdatabase.users', 'dmsdatabase.users.id', '=', 'dmsdatabase.transactions.pic_id')
                    ->select('dmsdatabase.transactions.number','dmsdatabase.transaction_types.name as type','masterdatabase.dmc_customer.CUSTOMER_NAME as location','dmsdatabase.transactions.quantity','dmsdatabase.users.name as pic');
        
        if($this->tnum != ''){
            $query = $query->where('number','like','%'.$this->tnum.'%');
        }
        if($this->pic != ''){
            $query = $query->where('pic_id',$this->pic);
        }
        if($this->type != ''){
            $query = $query->where('type_id',$this->type);
        }
        if($this->location != ''){
            $query = $query->where('location_id',$this->location);
        }
        return $query;
    }
}
