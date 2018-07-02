<?php
namespace App\Repositories;


use App\Sector;

class SectorRepo extends BaseRepo
{
    public function getModel()
    {
    return new Sector();
    }

}