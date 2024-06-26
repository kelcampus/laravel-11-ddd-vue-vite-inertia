<?php

namespace App\Units\Profile\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Units\Profile\Routes\Web;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Units\Profile\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        (new Web([
            'middleware' => ['web', 'auth'],
            'namespace'  => $this->namespace,
            'prefix'     => '',
            'group' => base_path('App/Units/Profile/Routes/Web.php')
        ]))->register();
    }
}
