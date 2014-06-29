<?php namespace IIMS\Repositories;

use IIMS\Models\Sales;
use IIMS\Interfaces\ISalesRepository;
use IIMS\Interfaces\ICustomerRepository;

class SalesRepository implements ISalesRepository {

    protected $customerRepository;

    function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

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

    public function create($inputs)
    {
        $customerId = $inputs['customer_id'];
        $products = $inputs['products'];

        if($customerId && $products)
        {
            $customer = $this->customerRepository->find($customerId, ['id']);
            if($customer)
            {
                Sales::create($inputs);
            }
        }
    }

    public function update($id, $inputs)
    {
        $sales_invoice = Sales::findOrFail($id);
        $sales_invoice->fill($inputs);

        $sales_invoice->save();
    }

    public function delete($id)
    {
        $sales_invoice = Sales::find($id);
        $sales_invoice->delete();
    }
}