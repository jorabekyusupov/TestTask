<?php

namespace App\Services;

class Service
{
    protected  $repository;

    public function get($relation = null)
    {
        return $this->repository->query($relation);
    }


    public function store($params)
    {
        return $this->repository->create($params);
    }

    public function edit($id, $params)
    {
        return $this->repository->update($id, $params);
    }

    public function show($id, $relation = null)
    {
        return $this->repository->show($id, $relation);
    }

    public function delete($id)
    {
        return $this->repository->destroy($id);
    }

    public function softDelete($id)
    {
        return $this->repository->softDelete($id);
    }




}
