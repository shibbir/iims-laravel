<?php namespace IIMS\Repositories;

use IIMS\Models\Organization;
use IIMS\Interfaces\IOrganizationRepository;

class OrganizationRepository implements IOrganizationRepository {

    public function find($id)
    {
        return Organization::find($id);
    }

    public function update($id, $input)
    {
        $organization = Organization::findOrFail($id);
        $organization->fill($input);

        $organization->save();
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function create($input)
    {
        // TODO: Implement create() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}