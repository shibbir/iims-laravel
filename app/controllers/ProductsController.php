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

    public function inventory()
    {
        return View::make('products.inventory');
    }

	public function index($category_id)
	{
        if(Request::ajax()) {
            return $this->productRepository->findAllByCategory($category_id, ['id', 'title', 'retail_price', 'quantity', 'updated_at']);
        }
        $supplier = $this->supplierRepository->find(1, ['id', 'company_name']);
        $category = $this->categoryRepository->find($category_id, ['id', 'title']);
        $products = $this->productRepository->findAllByCategory($category_id, ['id', 'title', 'category_id', 'supplier_id', 'quantity', 'updated_at']);

        return View::make('products.index', compact('products', 'category', 'supplier'));
	}

	public function create($category_id)
	{
        $selected_category_id = $category_id;
        $categories = $this->categoryRepository->findAllAsList('title', 'id');
        $suppliers = $this->supplierRepository->findAllAsList('company_name', 'id');

        return View::make('products.create', compact('selected_category_id', 'categories', 'suppliers'));
	}

	public function store($category_id)
	{
        $this->productForm->validate(Input::all());
        $this->productRepository->create(Input::all());

        return Redirect::to("categories/$category_id/products")->with($this->getSuccessNotification('Product added successfully.'));
	}

	public function show($category_id, $product_id)
	{
        $product = $this->productRepository->findWithCategoryByCategory($category_id, $product_id);

        return View::make('products.show')->withProduct($product);
	}

	public function edit($category_id, $product_id)
	{
        $selected_category_id = $category_id;
        $product = $this->productRepository->findByCategory($category_id, $product_id);
        $categories = $this->categoryRepository->findAllAsList('title', 'id');
        $suppliers = $this->supplierRepository->findAllAsList('company_name', 'id');

        return View::make('products.edit', compact('selected_category_id', 'product', 'categories', 'suppliers'));
	}

	public function update($category_id, $product_id)
	{
        $this->productForm->validate(Input::all());
        $this->productRepository->update($product_id, Input::all());

        return Redirect::to("categories/$category_id/products/$product_id/edit", $product_id)->with($this->getSuccessNotification('Product updated successfully.'));
	}
}