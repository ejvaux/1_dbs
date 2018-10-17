<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class DanplaList extends Model
{
    use Sortable;

    public $sortable = ['id','danpla_id','transaction_id','created_at','updated_at'];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction','transaction_id');
    }
    public function danpla()
    {
        return $this->belongsTo('App\Danpla','danpla_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','pic_id');
    }
}
