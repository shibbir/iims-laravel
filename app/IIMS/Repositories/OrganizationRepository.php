<?php namespace IIMS\Repositories;

use IIMS\Models\Organization;
use IIMS\Interfaces\IOrganizationRepository;

class OrganizationRepository implements IOrganizationRepository {

    public function getOrganization($id)
    {
        return Organization::find($id);
    }

    public function editOrganization($id, $input)
    {
        $organization = Organization::findOrFail($id);
        $organization->fill($input);

        $organization->save();
    }
}