<?php

use IIMS\Forms\Product;
use IIMS\Interfaces\IProductRepository;

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
        $products = $this->productRepository->findAll();
        return View::make('products.index')->withProducts($products);
	}

	public function create()
	{
        return View::make('products.create');
	}

	public function store()
	{
        $this->productForm->validate(Input::all());
        $this->productRepository->create(Input::all());

        $data = [
            'flash_type' => 'success',
            'flash_message' => 'Product added successfully.'
        ];

        return Redirect::route('products.index')->with($data);
	}

	public function show($id)
	{
        $product = $this->productRepository->find($id);
        return View::make('products.show')->withProduct($product);
	}

	public function edit($id)
	{
        $product = $this->productRepository->find($id);
        return View::make('products.edit')->withProduct($product);
	}

	public function update($id)
	{
        $this->productForm->validate(Input::all());
        $this->productRepository->update($id, Input::all());

        $data = [
            'flash_type' => 'success',
            'flash_message' => 'Product updated successfully.'
        ];

        return Redirect::route('products.edit', $id)->with($data);
	}

	public function destroy($id)
	{
	}
}