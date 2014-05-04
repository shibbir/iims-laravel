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
        return View::make('categories.create');
	}

	public function store()
	{
        $this->categoryForm->validate(Input::all());
        $this->categoryRepository->create(Input::all());

        return Redirect::route('categories.index')->with($this->getSuccessNotification('Category created successfully.'));
	}

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return View::make('categories.edit')->withCategory($category);
    }

    public function update($id)
    {
        $this->categoryForm->validate(Input::all());
        $this->categoryRepository->update($id, Input::all());

        return Redirect::route('categories.edit', $id)->with($this->getSuccessNotification('Category updated successfully.'));
    }

    public function delete($id)
    {
        $category = $this->categoryRepository->find($id);
        return View::make('categories.delete')->withCategory($category);
    }

	public function destroy($id)
	{
        $this->categoryRepository->delete($id);
        return Redirect::route('categories.index')->with($this->getSuccessNotification('Category deleted successfully.'));
	}
}