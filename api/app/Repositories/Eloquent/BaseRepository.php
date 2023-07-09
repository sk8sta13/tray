<?php

namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    public function __construct(
        private Model $model
    )
    {
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
}
