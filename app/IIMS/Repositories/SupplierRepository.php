<?php namespace IIMS\Repositories;

use IIMS\Models\Supplier;
use IIMS\Interfaces\ISupplierRepository;

class SupplierRepository implements ISupplierRepository {

    public function findAll($fields = [])
    {
        if(empty($fields)) return Supplier::paginate(10);
        return Supplier::paginate(10, $fields);
    }

    public function getSuppliersAsList($value, $key)
    {
        return Supplier::lists($value, $key);
    }

    public function find($id, $fields = [])
    {
        if(empty($fields)) return Supplier::findOrFail($id);
        return Supplier::findOrFail($id, $fields);
    }

    public function create($input)
    {
        Supplier::create($input);
    }

    public function update($id, $input)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->fill($input);

        $supplier->save();
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}