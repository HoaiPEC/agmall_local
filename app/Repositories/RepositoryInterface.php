<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create($attibutes = []);

    public function update($id, $attibutes = []);

    public function delete($id);

    public function getByRelation($column, $relation);
}
