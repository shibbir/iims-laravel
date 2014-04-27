<?php

class SessionController extends \BaseController {

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
		$input = Input::all();

        $attempt = Auth::attempt([
            'username' => $input['username'],
            'password' => $input['password']
        ]);

        if($attempt) {
            return Redirect::intended('/dashboard');
        }
        $data = ['flash_type' => 'error', 'flash_message' => 'Oops! Invalid username or password.'];
        return Redirect::back()->with($data)->withInput();
	}

	public function destroy()
	{
        Auth::logout();
        return Redirect::login();
	}
}