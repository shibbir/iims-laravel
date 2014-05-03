<?php namespace IIMS\Repositories;

use IIMS\Models\Organization;
use IIMS\Interfaces\IOrganizationRepository;

class OrganizationRepository implements IOrganizationRepository {

    public function find($id, $fields = [])
    {
        if(empty($fields)) return Organization::findOrFail($id);
        return Organization::findOrFail($id, $fields);
    }

    public function update($id, $input)
    {
        $organization = Organization::findOrFail($id);
        $organization->fill($input);

        $organization->save();
    }

    public function findAll($fields = [])
    {
        if(empty($fields)) return Organization::all();
        return Organization::get($fields);
    }

    public function create($input)
    {
        Organization::create($input);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}