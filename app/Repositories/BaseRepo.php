<?php
namespace App\Repositories;

use Illuminate\Support\Facades\App;

abstract class BaseRepo
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function allReg()
    {
        return $this->model->all();
    }


}