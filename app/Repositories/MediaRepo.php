<?php
namespace App\Repositories;


use App\Media;

class MediaRepo extends BaseRepo
{
    public function getModel()
    {
    return new Media();
    }

}