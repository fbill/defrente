<?php
namespace App\Repositories;


use App\Product;

class ProductRepo extends BaseRepo
{
    public function getModel()
    {
    return new Product();
    }

}