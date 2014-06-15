<?php namespace IIMS\Repositories;

use IIMS\Models\Customer;
use IIMS\Interfaces\ICustomerRepository;

class CustomerRepository implements ICustomerRepository {

    public function findAll($fields = [])
    {
        if(empty($fields)) return Customer::paginate(10);
        return Customer::paginate(10, $fields);
    }

    public function findByQuery($query, $fields = [])
    {
        if(empty($fields)) {
            $result = Customer::whereContact($query)->get();
        }
        else {
            $result = Customer::whereContact($query)->get($fields);

            if(!count($result))
            {
                $result = Customer::whereFirstName($query)->get($fields);
                if(!count($result))
                {
                    $result = Customer::whereLastName($query)->get($fields);
                }
            }
        }

        return $result;
    }

    public function findAllAsList($value, $key)
    {
        return Customer::lists($value, $key);
    }

    public function find($id, $fields = [])
    {
        if(empty($fields)) return Customer::findOrFail($id);
        return Customer::findOrFail($id, $fields);
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
    {
        $customer = Customer::find($id);
        $customer->delete();
    }
}