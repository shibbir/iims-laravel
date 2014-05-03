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

        return Redirect::back()->withInput()->with($this->getErrorNotification('Oops! Invalid username or password.'));
    }

	public function destroy()
	{
        Auth::logout();
        return Redirect::route('login')->with($this->getSuccessNotification('You have been logged out.'));
	}
}