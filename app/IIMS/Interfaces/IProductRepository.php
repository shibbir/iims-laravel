<?php namespace IIMS\Interfaces;

interface IProductRepository extends IRepository {
    public function findAllByCategory($category_id, $fields = []);
    public function findByCategory($category_id, $product_id, $fields = []);
    public function findWithCategoryByCategory($category_id, $product_id, $fields = []);
    public function updateQuantity($product_id, $quantity);
}