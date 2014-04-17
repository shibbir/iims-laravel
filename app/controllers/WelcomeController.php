<?php

class WelcomeController extends \BaseController {
	public function index()
	{
        return View::make('layouts.welcome');
	}
}