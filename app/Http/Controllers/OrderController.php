<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderStoreRequest;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Services\Order\OrderService;

class OrderController extends Controller
{
   public function __construct(OrderService $orderService)
   {
      $this->service = $orderService;
   }

    public function store(OrderStoreRequest $request)
    {
        return $this->service->store($request->validated());
    }


    public function MyOrders()
    {
        return $this->service->MyOrders();
    }
    public function show($id)
    {
        return $this->service->show($id);
    }


    public function update(OrderUpdateRequest $request, $id)
    {
        return $this->service->edit($id,$request->validated());
    }


    public function destroy($id)
    {
        return $this->service->delete($id);
    }

}
