<?php

namespace App\Exports;

use App\Danpla;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DanplaExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'BARCODE',
            'CODE',
            'TYPE',
            'LOCATION',
            'STATUS'
        ];
    }

    public function __construct($bcode = '',$code = '',$type = '',$location = '',$status = '')
    {
        $this->bcode = $bcode;
        $this->code = $code;
        $this->type = $type;
        $this->location = $location;
        $this->status = $status;
    }

    public function query()
    {
        $query = Danpla::join('dmsdatabase.danpla_types', 'dmsdatabase.danpla_types.id', '=', 'dmsdatabase.danplas.type_id')
                    ->join('masterdatabase.dmc_customer', 'masterdatabase.dmc_customer.CUSTOMER_ID', '=', 'dmsdatabase.danplas.location_id')
                    ->join('dmsdatabase.danpla_statuses', 'dmsdatabase.danpla_statuses.id', '=', 'dmsdatabase.danplas.status_id')
                    ->select('dmsdatabase.danplas.barcode','dmsdatabase.danplas.code','dmsdatabase.danpla_types.name as type','masterdatabase.dmc_customer.CUSTOMER_NAME as location','dmsdatabase.danpla_statuses.name as status');
        if($this->bcode != ''){
            $query = $query->where('barcode','like','%'.$this->bcode.'%');
        }
        if($this->code != ''){
            $query = $query->where('code','like','%'.$this->code.'%');
        }
        if($this->type != ''){
            $query = $query->where('type_id',$this->type);
        }
        if($this->location != ''){
            $query = $query->where('location_id',$this->location);
        }
        if($this->status != ''){
            $query = $query->where('status_id',$this->status);
        }
        return $query;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    /* public function collection()
    {
        return
        Danpla::join('dmsdatabase.danpla_types', 'dmsdatabase.danpla_types.id', '=', 'dmsdatabase.danplas.type_id')
                    ->join('masterdatabase.dmc_customer', 'masterdatabase.dmc_customer.CUSTOMER_ID', '=', 'dmsdatabase.danplas.location_id')
                    ->join('dmsdatabase.danpla_statuses', 'dmsdatabase.danpla_statuses.id', '=', 'dmsdatabase.danplas.status_id')
                    ->select('dmsdatabase.danplas.barcode','dmsdatabase.danplas.code','dmsdatabase.danpla_types.name as type','masterdatabase.dmc_customer.CUSTOMER_NAME as location','dmsdatabase.danpla_statuses.name as status')                      
                    ->orderBy('dmsdatabase.danplas.id','DESC')
                    ->take(1000)->get();
    } */
}
