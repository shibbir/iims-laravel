<?php

use IIMS\Forms\Customer;
use IIMS\Interfaces\ICustomerRepository;
use IIMS\Interfaces\ISalesRepository;

class CustomersController extends \BaseController {

    protected $customerForm;
    protected $customerRepository;
    protected $salesRepository;

    function __construct(ICustomerRepository $customerRepository, ISalesRepository $salesRepository, Customer $customerForm)
    {
        $this->beforeFilter('auth');
        $this->customerForm = $customerForm;
        $this->customerRepository = $customerRepository;
        $this->salesRepository = $salesRepository;
    }

	public function index()
	{
        $query = Request::get('q');
        $fields = ['id', 'first_name', 'last_name', 'contact', 'address'];

        if($query) {
            return $this->customerRepository->findByQuery($query, $fields);
        }
        $customers = $this->customerRepository->findAll($fields);
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
        $invoices = $this->salesRepository->findByCustomerId($id);
        return View::make('customers.show', compact('customer', 'invoices'));
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