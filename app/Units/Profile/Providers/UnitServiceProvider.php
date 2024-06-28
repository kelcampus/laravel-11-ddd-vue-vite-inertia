<?php

namespace App\Units\Profile\Providers;

use App\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'profile';

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
