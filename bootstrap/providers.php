<?php

return [
    /**
     * Support Service Providers
     */
    App\Support\Localization\LocalizationServiceProvider::class,

    /**
     * Domains
     */
    App\Domains\Users\Providers\DomainServiceProvider::class,
    //App\Domains\Jobs\Providers\DomainServiceProvider::class,

    /*
    * Units
    */
    App\Units\Core\Providers\UnitServiceProvider::class,
    App\Units\Profile\Providers\UnitServiceProvider::class,
    App\Units\Auth\Providers\UnitServiceProvider::class,

];
