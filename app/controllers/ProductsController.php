<?php

use IIMS\Forms\Product;
use IIMS\Interfaces\IProductRepository;
use IIMS\Forms\FormValidationException;

class ProductsController extends \BaseController {

    protected $productForm;
    protected $productRepository;

    function __construct(IProductRepository $productRepository, Product $productForm)
    {
        $this->beforeFilter('auth');
        $this->productForm = $productForm;
        $this->productRepository = $productRepository;
    }

	public function index()
	{
        $data = ['title' => 'Product Page', 'products' => $this->productRepository->findAll()];
        return View::make('product.index')->with($data);
	}

	public function create()
	{
        $data = ['title' => 'Product Create Page'];
        return View::make('product.create')->with($data);
	}

	public function store()
	{
        try
        {
            $this->productForm->validate(Input::all());
            $this->productRepository->create(Input::all());

            $data = [
                'flash_type' => 'success',
                'flash_message' => 'Product added successfully.'
            ];

            return Redirect::route('product.index')->with($data);
        }
        catch(FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
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