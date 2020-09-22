<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    abstract public function getModel();

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attibutes = [])
    {
        return $this->model->create($attibutes);
    }

    public function update($id, $attibutes = [])
    {
        $result = $this->getById($id);

        if ($result) {
            $result->update($attibutes);

            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->getById($id);

        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function getByRelation($column, $relation)
    {
        $result = $this->model->where($column, $relation)
            ->orderBy('updated_at', 'DESC')->paginate(config('numbers.paginate'));

        return $result;
    }
}
