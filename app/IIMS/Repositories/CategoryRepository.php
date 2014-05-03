<?php namespace IIMS\Repositories;

use IIMS\Models\Category;
use IIMS\Interfaces\ICategoryRepository;

class CategoryRepository implements ICategoryRepository {

    public function findAll($fields = [])
    {
        if(empty($fields)) return Category::paginate(10);
        return Category::paginate(10, $fields);
    }

    public function getCategoriesAsList($value, $key)
    {
        return Category::lists($value, $key);
    }

    public function find($id, $fields = [])
    {
        if(empty($fields)) return Category::findOrFail($id);
        return Category::findOrFail($id, $fields);
    }

    public function create($input)
    {
        Category::create($input);
    }

    public function update($id, $input)
    {
        $category = Category::findOrFail($id);
        $category->fill($input);

        $category->save();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}