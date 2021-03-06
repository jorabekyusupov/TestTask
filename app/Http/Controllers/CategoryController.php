<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{

   public function __construct(CategoryService $categoryService)
   {
      $this->service = $categoryService;
   }

    public function index()
    {
        $page = request('page') ?? 1;
        $rows = request('rows') ?? 100000;
        $products = $this->service->get()->where('status', true)->paginate($rows, ['*'], 'page name', $page);
        return response()->json($products, 200);
    }


    public function store(CategoryStoreRequest $request)
    {
        return $this->service->store($request->validated());
    }


    public function show($id)
    {
        return $this->service->show($id);
    }


    public function update(CategoryUpdateRequest $request, $id)
    {
        return $this->service->edit($id,$request->validated());
    }


    public function destroy($id)
    {
        return $this->service->delete($id);
    }

}
