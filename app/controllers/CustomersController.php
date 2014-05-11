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
        $query = Request::get('q');
        if($query) {
            return $this->customerRepository->findByContact($query, ['id', 'first_name', 'last_name', 'contact']);
        }
        $customers = $this->customerRepository->findAll(['id', 'first_name', 'last_name', 'contact', 'address']);
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

        return Redirect::route('customers.index')->with($this->getSuccessNotification('Customer added successfully.'));
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

        return Redirect::route('customers.edit', $id)->with($this->getSuccessNotification('Customer updated successfully.'));
	}

    public function findByContact($contact)
    {
        return $this->customerRepository->findByContact($contact);
    }
}