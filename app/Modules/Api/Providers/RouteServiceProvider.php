<?php

namespace App\Modules\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'App\Modules\Api\Http';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAlitripRoutes();
        $this->mapInnerRoutes();
        $this->mapOpenRoutes();
    }

    protected function mapAlitripRoutes()
    {
        Route::middleware('api')
            ->namespace($this->moduleNamespace . '\Alitrip\Controllers')
            ->group(module_path('Api', '/Routes/alitrip.php'));
    }

    protected function mapInnerRoutes()
    {
        Route::middleware(['api', 'api.sign.verify'])
            ->namespace($this->moduleNamespace . '\Inner\Controllers')
            ->group(module_path('Api', '/Routes/inner.php'));
    }

    protected function mapOpenRoutes()
    {
        Route::middleware(['api', 'api.sign.verify'])
            ->namespace($this->moduleNamespace . '\Open\Controllers')
            ->group(module_path('Api', '/Routes/open.php'));
    }
}
