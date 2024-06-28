<?php

namespace App\Support\Domain;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use ReflectionClass;

/**
 * Abstract ServiceProvider for Domains.
 */
abstract class ServiceProvider extends LaravelServiceProvider
{
    /**
     * @var string Domain alias for translations and other keys
     */
    protected $alias;

    /**
     * @var array List of domain providers to register
     */
    protected $subProviders;

    /**
     * @var array Contract bindings
     */
    public $bindings = [];

    /**
     * @var bool Enable translations for this Domain
     */
    protected $hasTranslations = false;

    public function boot()
    {
        // Register translations
        $this->registerTranslations();
    }

    /**
     * Register the current Domain.
     */
    public function register()
    {
        // Register Sub Providers
        $this->registerSubProviders(collect($this->subProviders));
        // Register bindings.
        $this->registerBindings(collect($this->bindings));
        // Register migrations.
        $this->registerMigrations();
    }

    /**
     * Register domain sub providers.
     *
     * @param Collection $subProviders
     */
    protected function registerSubProviders(Collection $subProviders)
    {
        $subProviders->each(function ($provider) {
            $this->app->register($provider);
        });
    }

    /**
     * Register the defined domain bindings.
     *
     * @param Collection $bindings
     */
    protected function registerBindings(Collection $bindings)
    {
        $bindings->each(function ($concretion, $abstraction) {
            $this->app->bind($abstraction, $concretion);
        });
    }

    /**
     * Register the defined migrations.
     *
     * @param Collection $migrations
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom($this->domainPath("Database/Migrations"));
    }

    /**
     * Register domain translations.
     */
    protected function registerTranslations()
    {
        if ($this->hasTranslations) {
            $this->loadTranslationsFrom(
                $this->domainPath('Resources/Lang'),
                $this->alias
            );
        }
    }

    /**
     * @param string $append
     *
     * @return string
     */
    protected function domainPath($append = null)
    {
        $reflection = new ReflectionClass($this);
        $realPath = realpath(dirname($reflection->getFileName()) . '/../');
        if (!$append) {
            return $realPath;
        }

        return $realPath . '/' . $append;
    }
}
