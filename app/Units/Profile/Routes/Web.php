<?php

namespace App\Units\Profile\Routes;

use App\Support\Http\Route;

/**
 * Web Routes.
 *
 * This file is where you may define all of the routes that are handled
 * by your application. Just tell Laravel the URIs it should respond
 * to using a Closure or controller method. Build something great!
 */

class Web extends Route
{
    /**
     * Declare Web Routes.
     */
    public function routes()
    {
        $this->profileRoutes();
    }

    protected function profileRoutes()
    {
        $this->router->get('profile', 'ProfileController@edit')->name('profile.edit');
        $this->router->patch('profile', 'ProfileController@update')->name('profile.update');
        $this->router->delete('profile', 'ProfileController@destroy')->name('profile.destroy');
    }
}
