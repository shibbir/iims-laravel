<?php namespace IIMS\Interfaces;

interface IOrganizationRepository
{
    public function getOrganization($id);
    public function editOrganization($id, $input);
}