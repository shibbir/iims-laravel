<?php namespace IIMS\Interfaces;

interface IProductMetadataRepository {
    public function findProductMetadataByProductId($product_id);
    public function findProductMetadataBySerial($serial);
    public function update($id, $model);
}