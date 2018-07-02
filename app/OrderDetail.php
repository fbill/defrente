<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $table = 'order_details';

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}
