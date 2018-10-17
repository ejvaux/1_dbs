<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transaction extends Model
{
    use Sortable;

    public $sortable = ['id','number','pic_id','type_id','location_id','quantity','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User','pic_id');
    }
    public function type()
    {
        return $this->belongsTo('App\TransactionType','type_id');
    }
    public function location()
    {
        return $this->belongsTo('App\Location','location_id','CUSTOMER_ID');
    }
}
