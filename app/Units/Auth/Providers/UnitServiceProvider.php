<?php

namespace App\Units\Auth\Providers;

use App\Support\Units\Providers\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'auth';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $providers = [
        RouteServiceProvider::class,
    ];
}
