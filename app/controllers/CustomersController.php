<?php

use IIMS\Forms\Customer;
use IIMS\Interfaces\ICustomerRepository;
use IIMS\Forms\FormValidationException;

class CustomersController extends \BaseController {

    protected $customerForm;
    protected $customerRepository;

    function __construct(ICustomerRepository $customerRepository, Customer $customerForm)
    {
        $this->beforeFilter('auth');
        $this->customerRepository = $customerRepository;
        $this->customerForm = $customerForm;
    }

	public function index()
	{
        $data = ['title' => 'Customer List Page', 'customers' => $this->customerRepository->findAll()];
        return View::make('customer.index')->with($data);
	}

	public function create()
	{
        $data = ['title' => 'Customer Create Page'];
        return View::make('customer.create')->with($data);
	}

	public function store()
	{
        try
        {
            $this->customerForm->validate(Input::all());
            $this->customerRepository->create(Input::all());

            $data = [
                'flash_type' => 'success',
                'flash_message' => 'Customer added successfully.'
            ];

            return Redirect::route('customers.index')->with($data);
        }
        catch(FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
	}

	public function show($id)
	{
        $data = ['title' => 'Customer Details Page', 'customer' => $this->customerRepository->find($id)];
        return View::make('customer.show')->with($data);
	}

	public function edit($id)
	{
        $data = ['title' => 'Customer Update Page', 'customer' => $this->customerRepository->find($id)];
        return View::make('customer.edit')->with($data);
	}

	public function update($id)
	{
        try
        {
            $this->customerForm->validate(Input::all());
            $this->customerRepository->update($id, Input::all());

            $data = [
                'flash_type' => 'success',
                'flash_message' => 'Customer updated successfully.'
            ];

            return Redirect::route('customers.edit', $id)->with($data);
        }
        catch(FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
	}

	public function destroy($id)
	{
	}
}