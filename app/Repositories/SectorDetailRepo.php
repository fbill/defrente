<?php
namespace App\Repositories;


use App\SectorDetail;

class SectorDetailRepo extends BaseRepo
{
    public function getModel()
    {
    return new SectorDetail();
    }

}