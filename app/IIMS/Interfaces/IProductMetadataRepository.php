<?php namespace IIMS\Interfaces;

interface IProductMetadataRepository {
    public function findProductMetadataByProductId($product_id);
}