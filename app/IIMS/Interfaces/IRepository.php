<?php namespace IIMS\Interfaces;

interface IRepository
{
    public function findAll($fields = []);
    public function find($id, $fields = []);
    public function create($input);
    public function update($id, $input);
    public function delete($id);
}