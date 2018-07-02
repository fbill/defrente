<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $table = 'tickets';

    public function order_detail()
    {
        return $this->belongsTo('App\OrderDetail');
    }
}
