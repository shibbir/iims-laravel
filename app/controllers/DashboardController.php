<?php

use IIMS\Interfaces\IOrganizationRepository;

class DashboardController extends \BaseController {

    protected $organizationRepository;

    function __construct(IOrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

	public function index()
	{
        $organization = $this->organizationRepository->find(1);
        return View::make('dashboard.index', compact('organization'));
	}
}