<?php

namespace App\Repository\Eloquent;

use App\Contracts\RepositoryInterface;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{

    /**
     * The relations to eager load.
     *
     * @var
     */
    protected $with = [];

    public function __construct(
        protected Model $model
    )
    {
    }

    public function all()
    {
        return $this->model->get();
    }

    public function get()
    {
        return $this->model
                    ->with($this->with)
                    ->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete($id);
    }

}
