<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempList extends Model
{
    public function danpla()
    {
        return $this->belongsTo('App\Danpla','danpla_id');
    }
}
