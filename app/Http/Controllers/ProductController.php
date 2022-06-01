<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Services\Product\ProductService;
use App\Traits\FileTrait;
use Illuminate\Support\Str;
use function PHPUnit\Framework\returnValueMap;

class ProductController extends Controller
{
    use FileTrait;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    public function index()
    {
        $page = request('page') ?? 1;
        $rows = request('rows') ?? 100000;

        $products = $this->service->get(['category'])->where('status', true)->whereHas('category', function ($query) {
            $query->where('status', true);
        })->paginate($rows, ['*'], 'page name', $page);
        return response()->json($products, 200);
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $model = $this->service->store($data);
        return $model;
    }


    public function show($id)
    {
        return $this->service->show($id);
    }


    public function update($id, ProductUpdateRequest $updateRequest)
    {
        $data = $updateRequest->validated();
        $model = $this->service->edit($id, $data);
        return $model;
    }


    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
