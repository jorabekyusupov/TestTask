<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use App\Services\Service;

class OrderService extends Service
{
    public function __construct(OrderRepository $order)
    {
        $this->repository = $order;
    }

    public function MyOrders()
    {
        $model = $this->get(['orderItems','orderItems.products'])->where('user_id', auth()->user()->id)->get();
        return response()->json($model);
    }
}
