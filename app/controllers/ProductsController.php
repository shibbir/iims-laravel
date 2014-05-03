<?php

use IIMS\Forms\Product;
use IIMS\Interfaces\IProductRepository;
use IIMS\Interfaces\ICategoryRepository;
use IIMS\Interfaces\ISupplierRepository;

class ProductsController extends \BaseController {

    protected $productForm;
    protected $productRepository;
    protected $categoryRepository;
    protected $supplierRepository;

    function __construct(IProductRepository $productRepository, ICategoryRepository $categoryRepository, ISupplierRepository $supplierRepository, Product $productForm)
    {
        $this->beforeFilter('auth');
        $this->productForm = $productForm;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->supplierRepository = $supplierRepository;
    }

	public function index()
	{
        $products = $this->productRepository->findAll(['id', 'title', 'category_id', 'supplier_id', 'unit_price', 'quantity', 'is_available']);
        return View::make('products.index')->withProducts($products);
	}

	public function create()
	{
        $categories = $this->categoryRepository->getCategoriesAsList('title', 'id');
        $suppliers = $this->supplierRepository->getSuppliersAsList('company_name', 'id');
        return View::make('products.create', compact('categories', 'suppliers'));
	}

	public function store()
	{
        $this->productForm->validate(Input::all());
        $this->productRepository->create(Input::all());

        return Redirect::route('products.index')->with($this->getSuccessNotification('Product added successfully.'));
	}

	public function show($id)
	{
        $product = $this->productRepository->find($id);
        return View::make('products.show')->withProduct($product);
	}

	public function edit($id)
	{
        $product = $this->productRepository->find($id);
        $categories = $this->categoryRepository->getCategoriesAsList('title', 'id');
        $suppliers = $this->supplierRepository->getSuppliersAsList('company_name', 'id');
        return View::make('products.edit', compact('product', 'categories', 'suppliers'));
	}

	public function update($id)
	{
        $this->productForm->validate(Input::all());
        $this->productRepository->update($id, Input::all());

        return Redirect::route('products.edit', $id)->with($this->getSuccessNotification('Product updated successfully.'));
	}

	public function destroy($id)
	{
	}
}