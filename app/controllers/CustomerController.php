<?php

use IIMS\Interfaces\ICustomerRepository;

class CustomerController extends \BaseController {

    protected $customerRepository;

    public function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

	public function index()
	{
        $data = ['title' => 'Customer List Page', 'customers' => $this->customerRepository->findAll()];
        return View::make('customer.index', $data);
	}

	public function create()
	{
        $data = ['title' => 'Customer Create Page'];
        return View::make('customer.create', $data);
	}

	public function store()
	{
	}

	public function show($id)
	{
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function destroy($id)
	{
	}
}