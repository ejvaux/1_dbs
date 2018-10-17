<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ScrapDanpla extends Model
{
    use Sortable;

    protected $fillable = ['created_at','updated_at']; 

    public $sortable = [
        'id',
        'barcode',
        'code',
        'type_id',
        'location_id',
        'condition_id',
        'status_id',
        'transaction_id',
        'created_at',
        'updated_at'
    ];



    public function type()
    {
        return $this->belongsTo('App\DanplaType','type_id');
    }
    public function location()
    {
        return $this->belongsTo('App\Location','location_id','CUSTOMER_ID');
    }
    public function condition()
    {
        return $this->belongsTo('App\DanplaCondition','condition_id');
    }
    public function status()
    {
        return $this->belongsTo('App\DanplaStatus','status_id');
    }
    public function transaction()
    {
        return $this->belongsTo('App\Transaction','transaction_id');
    }
}
