<?php namespace IIMS\Repositories;

use IIMS\Models\Product;
use IIMS\Interfaces\IProductRepository;

class ProductRepository implements IProductRepository {

    public function findAllByCategory($category_id, $fields = [])
    {
        if(empty($fields)) return Product::whereCategoryId($category_id)->paginate(15);
        return Product::whereCategoryId($category_id)->paginate(15, $fields);
    }

    public function findByCategory($category_id, $product_id, $fields = [])
    {
        if(empty($fields)) {
            return Product::where(function($query) use($product_id, $category_id) {
                $query->where('id', '=', $product_id);
                $query->where('category_id', '=', $category_id);
            })->first();
        }

        return Product::where(function($query) use($product_id, $category_id) {
            $query->where('id', '=', $product_id);
            $query->where('category_id', '=', $category_id);
        })->first($fields);
    }

    public function findWithCategoryByCategory($category_id, $product_id, $fields = [])
    {
        if(empty($fields)) {
            return Product::with('category')->where('id', '=', $product_id)->where('category_id', '=', $category_id)->first();
        }
        return Product::with('category')->where('id', '=', $product_id)->where('category_id', '=', $category_id)->first($fields);
    }

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

    public function updateQuantity($product_id, $quantity)
    {
        $product = Product::findOrFail($product_id);
        $product->quantity = $quantity;

        $product->save();
    }
}