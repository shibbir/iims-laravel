<?php namespace IIMS\Interfaces;

interface ICategoryRepository extends IRepository {
    public function findAllAsList($value, $key);
}