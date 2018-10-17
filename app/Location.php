<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mes';

    protected $table = 'dmc_customer';
}
