<?php
namespace App\Repositories;


use App\Info;

class InfoRepo extends BaseRepo
{
    public function getModel()
    {
    return new Info();
    }

}