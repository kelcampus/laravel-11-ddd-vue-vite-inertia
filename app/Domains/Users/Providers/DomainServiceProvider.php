<?php

namespace App\Domains\Users\Providers;

use App\Domains\Users\Database\Factories\UserFactory;
use App\Support\Domain\ServiceProvider;
use App\Domains\Users\Database\Seeders\DatabaseSeeder;
use App\Domains\Users\Database\Seeders\UserSeeder;

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
     * @var array Providers registered within the domain
     */
    protected $subProviders = [
        //EventServiceProvider::class,
    ];

    /**
     * @var array List of model factories to load
     */
    protected $factories = [
        UserFactory::class
    ];

    /**
     * @var array List of seeders provided by Domain
     */
    protected $seeders = [
        UserSeeder::class,
        DatabaseSeeder::class
    ];
}
