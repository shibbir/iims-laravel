<?php

use IIMS\Forms\Login;
use IIMS\Forms\FormValidationException;

class SessionController extends \BaseController {

    protected $loginForm;

    function __construct(Login $loginForm)
    {
        $this->loginForm = $loginForm;
    }

	public function create()
	{
        if(Auth::check())
        {
            return Redirect::dashboard();
        }
        return View::make('session.create');
	}

    public function store()
    {
        try
        {
            $this->loginForm->validate(Input::all());

            $input = Input::all();

            $attempt = Auth::attempt([
                'username' => $input['username'],
                'password' => $input['password']
            ]);

            if($attempt) {
                return Redirect::intended('/dashboard');
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
        return Redirect::login();
	}
}