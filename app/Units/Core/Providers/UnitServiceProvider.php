<?php

namespace App\Units\Core\Providers;

use App\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $alias = 'core';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $providers = [
        AppServiceProvider::class,
    ];
}
