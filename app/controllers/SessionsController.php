<?php

use IIMS\Forms\Login;

class SessionsController extends \BaseController {

    protected $loginForm;

    function __construct(Login $loginForm)
    {
        $this->loginForm = $loginForm;
    }

	public function create()
	{
        if(Auth::check())
        {
            return Redirect::route('dashboard');
        }
        return View::make('sessions.create');
	}

    public function store()
    {
        $this->loginForm->validate(Input::all());

        if(Auth::attempt(Input::only('username', 'password'))) {
            return Redirect::intended('dashboard');
        }

        $data = [
            'flash_type' => 'danger',
            'flash_message' => 'Oops! Invalid username or password.'
        ];
        return Redirect::back()->withInput()->with($data);
    }

	public function destroy()
	{
        Auth::logout();
        $data = [
            'flash_type' => 'success',
            'flash_message' => 'You have been logged out.'
        ];
        return Redirect::route('login')->with($data);
	}
}