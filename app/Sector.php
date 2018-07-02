<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectors';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function sector_details()
    {
        return $this->hasMany('App\SectorDetail');
    }
}
