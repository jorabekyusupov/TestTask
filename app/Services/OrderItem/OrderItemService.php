<?php

namespace App\Services\OrderItem;

use App\Repositories\Order\OrderRepository;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Services\Service;

class OrderItemService extends Service
{
    public function __construct(OrderItemRepository $order)
    {
        $this->repository = $order;
    }
}
