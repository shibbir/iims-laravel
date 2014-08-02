<?php namespace IIMS\Interfaces;

interface ISalesRepository extends IRepository {
    public function findByCustomerId($customer_id);
}