<?php namespace IIMS\Interfaces;

interface ISupplierRepository extends IRepository {
    public function getSuppliersAsList($value, $key);
}