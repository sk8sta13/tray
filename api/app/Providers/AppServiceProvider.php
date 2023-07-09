<?php

namespace App\Providers;

use App\Repositories\Eloquent\VendedorRepository;
use App\Repositories\VendedorRepositoryInterface;
use App\Repositories\Eloquent\VendaRepository;
use App\Repositories\VendaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VendedorRepositoryInterface::class, VendedorRepository::class);
        $this->app->bind(VendaRepositoryInterface::class, VendaRepository::class);
    }
}
