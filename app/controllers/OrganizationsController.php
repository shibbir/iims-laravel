<?php

use IIMS\Interfaces\IOrganizationRepository;

class OrganizationsController extends \BaseController {

    protected $organizationRepository;

    function __construct(IOrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

	public function show($id)
	{
        return $this->organizationRepository->find($id);
	}

	public function update($id)
	{
        try
        {
            $this->organizationRepository->update($id, Input::all());
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