<?php

use IIMS\Interfaces\ISalesRepository;
use IIMS\Interfaces\ISalesInvoiceProductDetailsRepository;
use IIMS\Interfaces\ICustomerRepository;

class SalesController extends \BaseController {

    protected $salesRepository;
    protected $salesInvoiceProductDetailsRepository;
    protected $customerRepository;

    function __construct(ICustomerRepository $customerRepository,
                         ISalesRepository $salesRepository,
                         ISalesInvoiceProductDetailsRepository $salesInvoiceProductDetailsRepository)
    {
        $this->beforeFilter('auth');
        $this->salesRepository = $salesRepository;
        $this->customerRepository = $customerRepository;
        $this->salesInvoiceProductDetailsRepository = $salesInvoiceProductDetailsRepository;
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
        if(Input::has('customer_id') && $this->customerRepository->find(Input::get('customer_id'), ['id']))
        {
            return $this->salesRepository->create(Input::all());
        }
	}

	public function show($id)
	{
        $sales_invoice = $this->salesRepository->find($id);

        $product_details = $this->salesInvoiceProductDetailsRepository->findAllByInvoiceIdWithProducts($id);
        foreach($product_details as $row) {
            $row->serial_numbers = $this->salesInvoiceProductDetailsRepository->findAllSerialByInvoiceDetailsId($row->id, $row->product_id);
        }

        return View::make('sales.show', compact('sales_invoice', 'product_details'));
	}
}