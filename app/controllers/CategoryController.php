<?php

use IIMS\Forms\Category;
use IIMS\Interfaces\ICategoryRepository;

class CategoryController extends \BaseController {

    protected $categoryForm;
    protected $categoryRepository;

    function __construct(ICategoryRepository $categoryRepository, Category $categoryForm)
    {
        $this->beforeFilter('auth');
        $this->categoryForm = $categoryForm;
        $this->categoryRepository = $categoryRepository;
    }

	public function index()
	{
        $categories = $this->categoryRepository->findAll();
        return View::make('categories.index')->withCategories($categories);
	}

	public function create()
	{
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