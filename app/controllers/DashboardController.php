<?php

class DashboardController extends \BaseController {

	public function index()
	{
        $data = ['title' => 'Welcome to the dashboard'];
        return View::make('dashboard.index', $data);
	}
}