<?php

use IIMS\Forms\SalesInvoice;
use IIMS\Interfaces\ISalesRepository;

class SalesController extends \BaseController {

    protected $salesInvoiceForm;
    protected $salesRepository;

    function __construct(ISalesRepository $salesRepository, SalesInvoice $salesInvoiceForm)
    {
        $this->beforeFilter('auth');
        $this->salesInvoiceForm = $salesInvoiceForm;
        $this->salesRepository = $salesRepository;
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
        $this->salesInvoiceForm->validate(Input::all());
        $this->salesRepository->create(Input::all());

        return Redirect::route('sales.index')->with($this->getSuccessNotification('New sales invoice added successfully.'));
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