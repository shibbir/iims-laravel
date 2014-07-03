<?php

use IIMS\Forms\SalesInvoice;
use IIMS\Interfaces\ISalesRepository;
use IIMS\Interfaces\ICustomerRepository;

class SalesController extends \BaseController {

    protected $salesInvoiceForm;
    protected $salesRepository;
    protected $customerRepository;

    function __construct(ICustomerRepository $customerRepository, ISalesRepository $salesRepository, SalesInvoice $salesInvoiceForm)
    {
        $this->beforeFilter('auth');
        $this->salesInvoiceForm = $salesInvoiceForm;
        $this->salesRepository = $salesRepository;
        $this->customerRepository = $customerRepository;
    }

	public function index()
	{
        $sales_invoices = $this->salesRepository->findAll();
        return View::make('sales.index', compact('sales_invoices'));
	}

	public function create()
	{
        return View::make('sales.create');
	}

	public function store()
	{
        //$this->salesInvoiceForm->validate(Input::all());

        if(Input::has('customer_id') && $this->customerRepository->find(Input::get('customer_id'), ['id']))
        {
            $this->salesRepository->create(Input::all());
        }
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