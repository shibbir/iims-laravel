<?php namespace IIMS\Repositories;

use IIMS\Models\Product;
use IIMS\Interfaces\IProductRepository;

class ProductRepository implements IProductRepository {

    public function findAll()
    {
        return Product::paginate(15);
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function create($input)
    {
        if($input['quantity'] > 0) {
            $input['is_available'] = 1;
        }
        Product::create($input);
    }

    public function update($id, $input)
    {
        $product = Product::findOrFail($id);
        $product->fill($input);

        $product->save();
    }

    public function delete($id)
    {}
}