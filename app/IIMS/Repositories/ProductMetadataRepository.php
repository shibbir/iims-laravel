<?php namespace IIMS\Repositories;

use IIMS\Models\ProductMetadata;
use IIMS\Interfaces\IProductMetadataRepository;

class ProductMetadataRepository implements IProductMetadataRepository {

    public function findProductMetadataByProductId($product_id)
    {
        return ProductMetadata::whereProductId($product_id)->paginate(15);
    }

    public function findProductMetadataBySerial($serial)
    {
        return ProductMetadata::whereSerial($serial)->first();
    }

    public function update($id, $model)
    {
        $productMetadata = ProductMetadata::findOrFail($id);
        $productMetadata->fill($model);

        $productMetadata->save();
    }
}