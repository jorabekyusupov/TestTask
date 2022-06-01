<?php

namespace App\Repositories\OrderItem;

use App\Models\OrderItem;
use App\Repositories\Repository;

class OrderItemRepository extends Repository
{
    public function __construct(OrderItem  $item)
    {
        $this->model = $item;
    }

}
