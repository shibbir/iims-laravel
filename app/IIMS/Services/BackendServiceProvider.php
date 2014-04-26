<?php namespace IIMS\Services;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('IIMS\Interfaces\IOrganizationRepository', 'IIMS\Repositories\OrganizationRepository');
    }
}