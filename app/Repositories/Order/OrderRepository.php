<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\Repository;

class OrderRepository extends Repository
{
    public function __construct(Order $order)
    {
        $this->model = $order;
    }

}
