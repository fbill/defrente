<?php
namespace App\Repositories;


use App\OrderDetail;

class OrderDetailRepo extends BaseRepo
{
    public function getModel()
    {
    return new OrderDetail();
    }

}