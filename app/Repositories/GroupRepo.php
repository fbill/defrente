<?php
namespace App\Repositories;


use App\Group;

class GroupRepo extends BaseRepo
{
    public function getModel()
    {
    return new Group();
    }

}