<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItem\OrderItemStoreRequest;
use App\Http\Requests\OrderItem\OrderItemUpdateRequest;
use App\Services\OrderItem\OrderItemService;

class OrderItemController extends Controller
{
    public function __construct(OrderItemService $orderItemService)
    {
        $this->service = $orderItemService;
    }

    public function store(OrderItemStoreRequest $request)
    {
        return $this->service->store($request->validated());
    }


    public function show($id)
    {
        return $this->service->show($id);
    }


    public function update(OrderItemUpdateRequest $request, $id)
    {
        return $this->service->edit($id,$request->validated());
    }


    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
