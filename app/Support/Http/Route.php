<?php

namespace App\Support\Http;

use Illuminate\Routing\Router;

/**
 * Class RouteFile.
 */
abstract class Route
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * @var array
     */
    public $options;

    public function __construct(array $options)
    {
        $this->router = app('router');
        $this->options = $options;
    }

    /**
     * Register Routes.
     */
    public function register()
    {
        $this->router->group($this->options, function () {
            $this->routes();
        });
    }

    /**
     * Define routes.
     *
     * @return mixed
     */
    abstract public function routes();
}
