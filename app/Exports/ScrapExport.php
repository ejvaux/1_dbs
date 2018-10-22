<?php

namespace App\Exports;

use App\ScrapDanpla;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ScrapExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'Barcode',
            'Code',
            'Type',
            'Location',
            'Status'
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
        $query = ScrapDanpla::join('dmsdatabase.danpla_types', 'dmsdatabase.danpla_types.id', '=', 'dmsdatabase.scrap_danplas.type_id')
                    ->join('masterdatabase.dmc_customer', 'masterdatabase.dmc_customer.CUSTOMER_ID', '=', 'dmsdatabase.scrap_danplas.location_id')
                    ->join('dmsdatabase.danpla_statuses', 'dmsdatabase.danpla_statuses.id', '=', 'dmsdatabase.scrap_danplas.status_id')
                    ->select('dmsdatabase.scrap_danplas.barcode','dmsdatabase.scrap_danplas.code','dmsdatabase.danpla_types.name as type','masterdatabase.dmc_customer.CUSTOMER_NAME as location','dmsdatabase.danpla_statuses.name as status');
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
}
