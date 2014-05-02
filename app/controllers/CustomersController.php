<?php

use IIMS\Forms\Customer;
use IIMS\Interfaces\ICustomerRepository;

class CustomersController extends \BaseController {

    protected $customerForm;
    protected $customerRepository;

    function __construct(ICustomerRepository $customerRepository, Customer $customerForm)
    {
        $this->beforeFilter('auth');
        $this->customerForm = $customerForm;
        $this->customerRepository = $customerRepository;
    }

	public function index()
	{
        $customers = $this->customerRepository->findAll();
        return View::make('customers.index')->withCustomers($customers);
	}

	public function create()
	{
        return View::make('customers.create');
	}

	public function store()
	{
        $this->customerForm->validate(Input::all());
        $this->customerRepository->create(Input::all());

        $data = [
            'flash_type' => 'success',
            'flash_message' => 'Customer added successfully.'
        ];

        return Redirect::route('customers.index')->with($data);
	}

	public function show($id)
	{
        $customer = $this->customerRepository->find($id);
        return View::make('customers.show')->withCustomer($customer);
	}

	public function edit($id)
	{
        $customer = $this->customerRepository->find($id);
        return View::make('customers.edit')->withCustomer($customer);
	}

	public function update($id)
	{
        $this->customerForm->validate(Input::all());
        $this->customerRepository->update($id, Input::all());

        $data = [
            'flash_type' => 'success',
            'flash_message' => 'Customer updated successfully.'
        ];

        return Redirect::route('customers.edit', $id)->with($data);
	}

	public function destroy($id)
	{
	}
}