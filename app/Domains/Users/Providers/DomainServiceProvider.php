<?php

namespace App\Domains\Users\Providers;

use App\Support\Domain\ServiceProvider;
use App\Domains\Users\Contracts;
use App\Domains\Users\Repositories;

/**
 * Class DomainServiceProvider.
 *
 * Register Users Domain Resources and Services
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * @var string Domain "alias"
     */
    protected $alias = 'Users';

    /**
     * @var bool Enable translations
     */
    protected $hasTranslations = true;

    /**
     * @var array Bind contracts to implementations
     */
    public $bindings = [
        Contracts\UserRepository::class => Repositories\UserRepository::class,
    ];

    /**
     * @var array Providers registered within the domain
     */
    protected $subProviders = [
        //EventServiceProvider::class,
    ];
}
