<?php namespace IIMS\Repositories;

use IIMS\Models\SalesDetails;
use IIMS\Interfaces\ISalesDetailsRepository;

class SalesDetailsRepository implements ISalesDetailsRepository {

    public function find($id, $fields = [])
    {
    }

    public function create($model)
    {
        SalesDetails::create($model);
    }

    public function findAll($fields = [])
    {
        // TODO: Implement findAll() method.
    }

    public function update($id, $input)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}