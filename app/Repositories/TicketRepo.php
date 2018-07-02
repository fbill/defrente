<?php
namespace App\Repositories;


use App\Ticket;

class TicketRepo extends BaseRepo
{
    public function getModel()
    {
    return new Ticket();
    }

}