<?php

namespace App\Repositories;

class Repository
{

    protected  $model, $modelView, $modelTranslation;

    public function query($relation = null)
    {
        if ($relation) {
            return $this->model->with(...$relation);
        }
        return $this->model->query();
    }


    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->query()->find($id);
        if ($model) {
            $model = $model->update($data);
            if ($model) {
                $model = $this->show($id, null);
                return $model;
            } else {
                return response()->json(['message' => 'Not implemented'], 501);
            }
        } else {
            return response()->json(['message' => 'Not found'], 404);
        }
    }
    public function show($id, $relations = null)
    {
        $model = $this->query($relations);
        $model = $model->find($id);
        if ($model) {
            return response()->json($model);
        } else {
            return response()->json(['message' => 'Not found'], 404);
        }
    }
    public function destroy($id)
    {
        $model = $this->query();
        try {
            $model = $model->find($id);
            $model->delete();
            return response()->json(['message' => 'Successfully deleted'], 204);
        } catch (\Throwable $throwable) {
            info($throwable->getMessage());
            return response()->json(['message' => 'Not found'], 404);
        }
    }

    public function softDelete($id)
    {
        $model = $this->query()->find($id);
        if ($model) {
            $model->deleted_by = auth()->id();
            $model->save();
            $model->delete();
            return response()->noContent();
        } else {
            return response()->json(['message' => 'Not found'], 404);
        }
    }



}
