<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorDetail extends Model
{
    protected $table = 'sector_details';

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
}
