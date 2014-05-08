<?php namespace IIMS\Repositories;

use IIMS\Models\Sales;
use IIMS\Interfaces\ISalesRepository;

class SalesRepository implements ISalesRepository {

    public function findAll($fields = [])
    {
        if(empty($fields)) return Sales::paginate(10);
        return Sales::paginate(10, $fields);
    }

    public function find($id, $fields = [])
    {
        if(empty($fields)) return Sales::findOrFail($id);
        return Sales::findOrFail($id, $fields);
    }

    public function create($input)
    {
        Sales::create($input);
    }

    public function update($id, $input)
    {
        $sales_invoice = Sales::findOrFail($id);
        $sales_invoice->fill($input);

        $sales_invoice->save();
    }

    public function delete($id)
    {
        $sales_invoice = Sales::find($id);
        $sales_invoice->delete();
    }
}