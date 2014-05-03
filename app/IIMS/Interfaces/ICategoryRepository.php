<?php namespace IIMS\Interfaces;

interface ICategoryRepository extends IRepository {
    public function getCategoriesAsList($value, $key);
}