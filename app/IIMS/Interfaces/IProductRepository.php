<?php namespace IIMS\Interfaces;

interface IProductRepository
{
    public function findAll();
    public function find($id);
    public function create($input);
    public function update($id, $input);
    public function delete($id);
}