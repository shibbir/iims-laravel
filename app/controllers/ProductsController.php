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

            return Redirect::route('products.index')->with($data);
        }
        catch(FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
	}

	public function show($id)
	{
        $data = ['title' => 'Product Details Page', 'product' => $this->productRepository->find($id)];
        return View::make('product.show')->with($data);
	}

	public function edit($id)
	{
        $data = ['title' => 'Product Details Page', 'product' => $this->productRepository->find($id)];
        return View::make('product.edit')->with($data);
	}

	public function update($id)
	{
        try
        {
            $this->productForm->validate(Input::all());
            $this->productRepository->update($id, Input::all());

            $data = [
                'flash_type' => 'success',
                'flash_message' => 'Product updated successfully.'
            ];

            return Redirect::route('products.edit', $id)->with($data);
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