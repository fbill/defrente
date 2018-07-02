<?php
namespace App\Repositories;


use App\Order;

class OrderRepo extends BaseRepo
{
    public function getModel()
    {
    return new Order();
    }

}