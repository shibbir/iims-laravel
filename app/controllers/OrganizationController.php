<?php

use IIMS\Forms\Organization;
use IIMS\Interfaces\IOrganizationRepository;

class OrganizationController extends \BaseController {

    protected $organizationForm;
    protected $organizationRepository;

    function __construct(Organization $organizationForm, IOrganizationRepository $organizationRepository)
    {
        $this->organizationForm = $organizationForm;
        $this->organizationRepository = $organizationRepository;
    }

	public function show()
	{
        return $this->organizationRepository->find(1);
	}

    public function edit()
    {
        $organization = $this->organizationRepository->find(1);
        return View::make('organization.edit')->withOrganization($organization);
    }

    public function update()
    {
        $this->organizationForm->validate(Input::all());
        $this->organizationRepository->update(1, Input::all());

        return Redirect::route('organization.edit')->with($this->getSuccessNotification('Organization information updated successfully.'));
    }
}