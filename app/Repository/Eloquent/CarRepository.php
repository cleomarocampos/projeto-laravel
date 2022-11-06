<?php

namespace App\Repository\Eloquent;

use App\Models\Car;
use App\Contracts\CarRepositoryInterface;

class CarRepository extends BaseRepository implements CarRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Car);
    }

    public function findAll()
    {
        return $this->model
                    ->orderBy('cars.id', 'DESC')
                    ->with('user')
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
