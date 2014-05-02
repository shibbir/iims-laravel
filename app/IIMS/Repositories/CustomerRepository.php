<?php namespace IIMS\Repositories;

use IIMS\Models\Customer;
use IIMS\Interfaces\ICustomerRepository;

class CustomerRepository implements ICustomerRepository {

    public function findAll()
    {
        return Customer::paginate(10);
    }

    public function find($id)
    {
        return Customer::findOrFail($id);
    }

    public function create($input)
    {
        Customer::create($input);
    }

    public function update($id, $input)
    {
        $customer = Customer::findOrFail($id);
        $customer->fill($input);

        $customer->save();
    }

    public function delete($id)
    {}
}