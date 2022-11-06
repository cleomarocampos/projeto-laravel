<?php

namespace App\Services;

use App\Contracts\UserRepositoryInterface;

class UserService
{

    public function __construct(
        protected UserRepositoryInterface $repository
    )
    {
    }

    public function findAll()
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

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

}
