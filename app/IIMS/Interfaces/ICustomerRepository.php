<?php namespace IIMS\Interfaces;

interface ICustomerRepository extends IRepository {
    public function findAllAsList($value, $key);
    public function findByQuery($query, $fields = []);
}