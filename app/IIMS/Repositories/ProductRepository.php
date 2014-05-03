<?php namespace IIMS\Repositories;

use IIMS\Models\Product;
use IIMS\Interfaces\IProductRepository;

class ProductRepository implements IProductRepository {

    public function findAll($fields = [])
    {
        if(empty($fields)) return Product::paginate(15);
        return Product::paginate(15, $fields);
    }

    public function find($id, $fields = [])
    {
        if(empty($fields)) return Product::findOrFail($id);
        return Product::findOrFail($id, $fields);
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
    {
        $product = Product::find($id);
        $product->delete();
    }
}