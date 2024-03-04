<?php

namespace App\Providers;

use App\Models\OrderProduct;
use App\Repositories\Interfaces\OrderProductRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\OrderProductRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\OrderService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Revalto\ServiceRepository\Repository\AbstractRepository;
use Revalto\ServiceRepository\Repository\AbstractRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind( OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind( UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(OrderProductRepositoryInterface::class,OrderProductRepository::class);
        $this->app->bind( RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->bind(AbstractRepositoryInterface::class, AbstractRepository::class);
    }
}
