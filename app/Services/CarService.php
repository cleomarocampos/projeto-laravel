<?php

namespace App\Services;

use App\Contracts\CarRepositoryInterface;


class CarService
{

    public function __construct(
        protected CarRepositoryInterface $repository
    )
    {
    }

    public function all()
    {
        return $this->repository->findAll();
    }

    public function findAllTrash()
    {
        return $this->repository->findAllTrash();
    }

    public function trashDelete($id)
    {
        return $this->repository->trashDelete($id);
    }

    public function trashRestore($id)
    {
        return $this->repository->trashRestore($id);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

}
