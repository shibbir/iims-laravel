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
        return $this->organizationRepository->find($id, ['id', 'title', 'sub_title', 'mobile', 'phone', 'email', 'website', 'address', 'description']);
	}

	public function update($id)
	{
        try
        {
            $this->organizationRepository->update($id, Input::all());
        }
        catch(ValidationException $e)
        {
            return Response::json($e->getErrors());
        }
	}
}