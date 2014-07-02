<?php namespace IIMS\Repositories;

use IIMS\Models\ProductMetadata;
use IIMS\Interfaces\IProductMetadataRepository;

class ProductMetadataRepository implements IProductMetadataRepository {

    public function findProductMetadataByProductId($product_id)
    {
        return ProductMetadata::whereProductId($product_id)->paginate(2);
    }
}