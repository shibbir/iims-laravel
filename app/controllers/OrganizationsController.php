<?php

use IIMS\Interfaces\IOrganizationRepository;

class OrganizationsController extends \BaseController {

    protected $organizationRepository;

    public function __construct(IOrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function index()
    {
        return $this->organizationRepository->getOrganization(1);
    }
}