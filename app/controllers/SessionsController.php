<?php

use IIMS\Forms\Login;
use IIMS\Forms\FormValidationException;

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
        return View::make('session.create');
	}

    public function store()
    {
        try
        {
            $this->loginForm->validate(Input::all());

            if(Auth::attempt(Input::only('username', 'password'))) {
                return Redirect::intended('dashboard');
            }

            $data = [
                'flash_type' => 'error',
                'flash_message' => 'Oops! Invalid username or password.'
            ];
            return Redirect::back()->withInput()->with($data);
        }
        catch(FormValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
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