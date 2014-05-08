<?php namespace IIMS\Interfaces;

interface ISupplierRepository extends IRepository {
    public function findAllAsList($value, $key);
}