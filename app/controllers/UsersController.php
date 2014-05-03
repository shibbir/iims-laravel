<?php

use IIMS\Forms\User;
use IIMS\Interfaces\IUserRepository;

class UsersController extends \BaseController {

    protected $userForm;
    protected $userRepository;

    function __construct(IUserRepository $userRepository, User $userForm)
    {
        $this->beforeFilter('auth');
        $this->userForm = $userForm;
        $this->userRepository = $userRepository;
    }

	public function index()
	{
        $users = $this->userRepository->findAll();
        return View::make('users.index')->withUsers($users);
	}

	public function create()
	{
        return View::make('users.create');
	}

	public function store()
	{
        $this->userForm->validate(Input::all());
        $this->userRepository->create(Input::all());

        return Redirect::route('users.index')->with($this->getSuccessNotification('User added successfully.'));
	}

	public function show($id)
	{
        $user = $this->userRepository->find($id);
        return View::make('users.show')->withUser($user);
	}

	public function edit($id)
	{
        $user = $this->userRepository->find($id);
        return View::make('users.edit')->withUser($user);
	}

    public function update($id)
    {
        $this->userForm->validate(Input::all());
        $this->userRepository->update($id, Input::all());

        return Redirect::route('users.edit', $id)->with($this->getSuccessNotification('User updated successfully.'));
    }

    public function profile()
    {
        $user = $this->userRepository->find(Auth::user()->id);
        return View::make('users.show')->withUser($user);
    }

	public function destroy($id)
	{
	}
}