<?php namespace IIMS\Services;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('IIMS\Interfaces\IUserRepository', 'IIMS\Repositories\UserRepository');
        $this->app->bind('IIMS\Interfaces\IOrganizationRepository', 'IIMS\Repositories\OrganizationRepository');
        $this->app->bind('IIMS\Interfaces\ICustomerRepository', 'IIMS\Repositories\CustomerRepository');
        $this->app->bind('IIMS\Interfaces\IProductRepository', 'IIMS\Repositories\ProductRepository');
    }
}