<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new User);
    }

    public function delete($id)
    {
        $user = $this->find($id);
        $user->cars()->delete();
        $user->delete();
    }

    public function findAll()
    {
        return $this->model->withCount('cars')
                            ->orderBy('users.id', 'DESC')
                            ->get();
    }

    public function findAllTrash()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function trashRestore($id)
    {
        return $this->model->withTrashed()->find($id)->restore();
    }

    public function trashDelete($id)
    {
        return $this->model->onlyTrashed()->find($id)->forceDelete();
    }

}
