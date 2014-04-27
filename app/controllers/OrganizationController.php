<?php

use IIMS\Interfaces\IOrganizationRepository;

class OrganizationController extends \BaseController {

    protected $organizationRepository;

    public function __construct(IOrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

	public function show($id)
	{
        return $this->organizationRepository->getOrganization($id);
	}

	public function update($id)
	{
        try
        {
            $this->organizationRepository->editOrganization($id, Input::all());
            $response['responseType'] = 'success';
        }
        catch(ValidationException $e)
        {
            $response['responseType'] = 'success';
            $response['message'] = $e->getErrors();
        }

        return json_encode($response);
	}
}