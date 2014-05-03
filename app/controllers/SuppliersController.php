<?php

use IIMS\Forms\Supplier;
use IIMS\Interfaces\ISupplierRepository;

class SuppliersController extends \BaseController {

    protected $supplierForm;
    protected $supplierRepository;

    function __construct(ISupplierRepository $supplierRepository, Supplier $supplierForm)
    {
        $this->beforeFilter('auth');
        $this->supplierForm = $supplierForm;
        $this->supplierRepository = $supplierRepository;
    }

	public function index()
	{
        $suppliers = $this->supplierRepository->findAll(['id', 'company_name', 'email', 'mobile', 'address']);
        return View::make('suppliers.index')->withSuppliers($suppliers);
	}

	public function create()
	{
        return View::make('suppliers.create');
	}

	public function store()
	{
        $this->supplierForm->validate(Input::all());
        $this->supplierRepository->create(Input::all());

        return Redirect::route('suppliers.index')->with($this->getSuccessNotification('Supplier added successfully.'));
	}

	public function show($id)
	{
        $supplier = $this->supplierRepository->find($id);
        return View::make('suppliers.show')->withSupplier($supplier);
	}

	public function edit($id)
	{
        $supplier = $this->supplierRepository->find($id);
        return View::make('suppliers.edit')->withSupplier($supplier);
	}

	public function update($id)
	{
        $this->supplierForm->validate(Input::all());
        $this->supplierRepository->update($id, Input::all());

        return Redirect::route('suppliers.edit', $id)->with($this->getSuccessNotification('Supplier updated successfully.'));
	}

	public function destroy($id)
	{
	}
}