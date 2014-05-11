<?php namespace IIMS\Interfaces;

interface ICustomerRepository extends IRepository {
    public function findAllAsList($value, $key);
    public function findByContact($contact, $fields = []);
}