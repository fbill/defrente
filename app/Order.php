<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }


}
