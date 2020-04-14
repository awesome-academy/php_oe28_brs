<?php

namespace App\Repositories;

use App\Models\Category;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->model->findOrFail($id);
        $result->update($attributes);

        return $result;
    }

    public function delete($id)
    {
        $result = $this->model->findOrFail($id);
        $result->delete();

        return true;
    }

    public function getAllCategory()
    {
        return Category::all();
    }
}
